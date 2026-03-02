<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Services\ProfileService;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    /* PERFIL */

    /**
     * Muestra el perfil del usuario.
     */
    public function show(string $username, Request $request, ProfileService $svc)
    {
        $viewerId = Auth::id(); // puede ser null
        $data = $svc->buildProfilePage($username, $viewerId ? (int) $viewerId : null);

        if ($data === null) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($data);
    }

    /**
     * Muestra la actividad del usuario (tabs de actividad).
     */
    public function activity(string $username, Request $request, ProfileService $svc)
    {
        $page = $this->clampInt((int) $request->query('page', 1), 1, 200);
        $perPage = $this->clampInt((int) $request->query('per_page', 15), 6, 40);

        $userId = $svc->findUserIdByUsername($username);
        if (!$userId) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($svc->buildUserActivity((int) $userId, $page, $perPage));
    }

    /**
     * Recupera las reseñas del usuario para el tab de actividad.
     */
    public function reviews(string $username, Request $request, ProfileService $svc)
    {
        $perPage = $this->clampInt((int) $request->query('per_page', 12), 6, 40);

        $userId = $svc->findUserIdByUsername($username);
        if (!$userId) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return $svc->userReviewsQuery((int) $userId)->paginate($perPage);
    }

    /**
     * Recupera las notas del usuario para el tab de actividad.
     */
    public function ratings(string $username, Request $request, ProfileService $svc)
    {
        $perPage = $this->clampInt((int) $request->query('per_page', 16), 8, 60);

        $sort = $request->query('sort', 'recent'); // recent | high | low
        if (!in_array($sort, ['recent', 'high', 'low'], true)) {
            return response()->json(['message' => 'Parámetro inválido'], 400);
        }

        $filter = $request->query('filter', 'all'); // all | high | low
        if (!in_array($filter, ['all', 'high', 'low'], true)) {
            return response()->json(['message' => 'Parámetro inválido'], 400);
        }

        $userId = $svc->findUserIdByUsername($username);
        if (!$userId) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // OJO: asegúrate de que el service soporte $filter si lo usas aquí
        return $svc->userRatingsQuery((int) $userId, $sort, $filter)->paginate($perPage);
    }

    /**
     * Recupera los posts del usuario para el tab de actividad.
     */
    public function posts(string $username, Request $request, ProfileService $svc)
    {
        $perPage = $this->clampInt((int) $request->query('per_page', 12), 6, 40);

        $userId = $svc->findUserIdByUsername($username);
        if (!$userId) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $p = $svc->userPostsQuery((int) $userId)->paginate($perPage);

        $p->getCollection()->transform(function ($post) {
            $post->media_url = $this->publicPostMediaUrl($post->media_url, $post->type);
            return $post;
        });

        return $p;
    }

    /**
     * Recupera los seguidores del usuario para el tab social.
     */
    public function followers(string $username, Request $request, ProfileService $svc)
    {
        $perPage = $this->clampInt((int) $request->query('per_page', 20), 10, 60);

        $userId = $svc->findUserIdByUsername($username);
        if (!$userId) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return $svc->followersQuery((int) $userId)->paginate($perPage);
    }

    /**
     * Recupera los seguidos por el usuario para el tab social.
     */
    public function following(string $username, Request $request, ProfileService $svc)
    {
        $perPage = $this->clampInt((int) $request->query('per_page', 20), 10, 60);

        $userId = $svc->findUserIdByUsername($username);
        if (!$userId) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return $svc->followingQuery((int) $userId)->paginate($perPage);
    }

    /**
     * Sigue a un usuario.
     */
    public function follow(string $username, Request $request, ProfileService $svc)
    {
        $viewerId = Auth::id();
        if (!$viewerId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $out = $svc->followByUsername($username, (int) $viewerId);

        if ($out === null) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        if (isset($out['error'])) {
            return response()->json(['message' => $out['error']], 400);
        }

        return response()->json($out);
    }

    /**
     * Deja de seguir a un usuario.
     */
    public function unfollow(string $username, Request $request, ProfileService $svc)
    {
        $viewerId = Auth::id();
        if (!$viewerId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $out = $svc->unfollowByUsername($username, (int) $viewerId);

        if ($out === null) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        if (isset($out['error'])) {
            return response()->json(['message' => $out['error']], 400);
        }

        return response()->json($out);
    }

    /**
     * Edita el perfil del usuario.
     */
    public function update(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'username'  => ['required', 'string', 'max:255'],
            'country'   => ['nullable', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'avatar'    => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remove_avatar' => ['nullable'],
        ]);

        $exists = User::query()
            ->where('username', $data['username'])
            ->where('id', '<>', (int) $userId)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Ese username ya existe'], 409);
        }

        $user = User::query()->where('id', $userId)->firstOrFail();

        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->country = $data['country'] ?? null;
        $user->birthdate = $data['birthdate'] ?? null;

        // Quitar avatar
        $remove = $request->input('remove_avatar');
        if ($this->isTruthy($remove)) {
            $this->deleteStoredAvatar($user->avatar_url);
            $user->avatar_url = null;
        }

        // Subir nuevo avatar
        if ($request->hasFile('avatar')) {
            $this->deleteStoredAvatar($user->avatar_url);

            $file = $request->file('avatar');
            $ext = strtolower($file->getClientOriginalExtension() ?: 'jpg');
            $filename = 'u' . $userId . '_' . time() . '_' . Str::random(8) . '.' . $ext;

            // Guarda en storage/app/public/avatars
            $path = $file->storeAs('avatars', $filename, 'public');

            // URL pública absoluta
            $user->avatar_url = url(Storage::url($path));
        }

        $user->save();

        return response()->json([
            'user' => [
                'id'         => (int) $user->id,
                'username'   => $user->username,
                'name'       => $user->name,
                'avatar_url' => $user->avatar_url,
                'country'    => $user->country,
                'birthdate'  => $user->birthdate ? $user->birthdate->toDateString() : null,
            ],
        ]);
    }

    /**
     * Borra el avatar del Storage.
     */
    private function deleteStoredAvatar(?string $avatarUrl): void
    {
        if (!$avatarUrl) return;

        $pos = strpos($avatarUrl, '/storage/');
        if ($pos === false) return;

        $relative = substr($avatarUrl, $pos + strlen('/storage/')); // avatars/x.jpg

        if ($relative && Storage::disk('public')->exists($relative)) {
            Storage::disk('public')->delete($relative);
        }
    }

    /**
     * Normaliza la URL pública del media de un post (clip o screenshot).
     * Convierte las rutas en URLs accesibles usando la carpeta correcta y Storage.
     */
    private function publicPostMediaUrl($mediaUrl, $postType): ?string
    {
        $m = trim((string) ($mediaUrl ?? ''));
        if ($m === '') return null;

        if (preg_match('#^(https?:)?//#i', $m) || str_starts_with($m, 'data:')) {
            return $m;
        }

        $m = str_replace('\\', '/', ltrim($m, '/'));

        if (str_starts_with($m, 'storage/')) {
            return url('/' . $m);
        }

        if (!str_contains($m, '/')) {
            $folder = ($postType === 'clip') ? 'posts/clips' : 'posts/screenshots';
            $m = $folder . '/' . $m;
        } else {
            if (str_starts_with($m, 'clips/') || str_starts_with($m, 'screenshots/')) {
                $m = 'posts/' . $m;
            }
        }

        return url(Storage::url($m));
    }

    /* CRUD DE POST */

    public function storePost(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $data = $request->validate([
            'type' => ['required', 'in:note,screenshot,clip'],
            'text' => ['nullable', 'string', 'max:5000'],
            'game_id' => ['nullable', 'integer', 'exists:games,id'],

            // Opción A: subir fichero (imagen/video)
            'media' => ['nullable', 'file', 'max:20480'], // 20MB

            // Opción B: URL externa
            'media_url' => ['nullable', 'string', 'max:2048'],

            // Opcional
            'media_width' => ['nullable', 'integer', 'min:1', 'max:10000'],
            'media_height' => ['nullable', 'integer', 'min:1', 'max:10000'],
        ]);

        $type = $data['type'];
        $text = isset($data['text']) ? trim((string) $data['text']) : '';
        $hasFile = $request->hasFile('media');
        $mediaUrlInput = isset($data['media_url']) ? trim((string) $data['media_url']) : '';

        if ($type === 'note' && $text === '') {
            return response()->json(['message' => 'El texto es obligatorio en un post tipo note'], 422);
        }

        if ($type === 'screenshot' && !$hasFile && $mediaUrlInput === '') {
            return response()->json(['message' => 'Debes subir una imagen o indicar media_url'], 422);
        }

        if ($type === 'clip' && !$hasFile && $mediaUrlInput === '') {
            return response()->json(['message' => 'Debes subir un vídeo o indicar media_url'], 422);
        }

        $post = new Post();
        $post->user_id = (int) $userId;
        $post->game_id = isset($data['game_id']) ? (int) $data['game_id'] : null;
        $post->type = $type;
        $post->text = $text !== '' ? $text : null;

        $post->media_width = $data['media_width'] ?? null;
        $post->media_height = $data['media_height'] ?? null;

        if ($hasFile) {
            $file = $request->file('media');

            $folder = ($type === 'clip') ? 'posts/clips' : 'posts/screenshots';

            $ext = strtolower($file->getClientOriginalExtension() ?: ($type === 'clip' ? 'mp4' : 'jpg'));
            $filename = 'p' . $userId . '_' . time() . '_' . Str::random(8) . '.' . $ext;

            $path = $file->storeAs($folder, $filename, 'public');
            $post->media_url = $path;

            // Trata de calcular las dimensiones de la imagen si no vienen incluidas
            if ($type === 'screenshot' && (!$post->media_width || !$post->media_height)) {
                $realPath = $file->getRealPath();
                if ($realPath) {
                    $size = @getimagesize($realPath);
                    if (is_array($size)) {
                        $post->media_width = $post->media_width ?: (int) $size[0];
                        $post->media_height = $post->media_height ?: (int) $size[1];
                    }
                }
            }
        } else {
            $post->media_url = $mediaUrlInput !== '' ? $mediaUrlInput : null;
        }

        $post->save();

        $out = Post::query()
            ->where('id', $post->id)
            ->with(['game:id,title,slug,cover_url,cover_thumb_url,release_date'])
            ->withCount(['likes', 'comments'])
            ->first();

        if ($out) {
            $out->media_url = $this->publicPostMediaUrl($out->media_url, $out->type);
        }

        return response()->json(['post' => $out], 201);
    }

    public function updatePost(int $id, Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $post = Post::query()->where('id', $id)->first();
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        if ((int) $post->user_id !== (int) $userId) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $data = $request->validate([
            'type' => ['nullable', 'in:note,screenshot,clip'],
            'text' => ['nullable', 'string', 'max:5000'],

            'media' => ['nullable', 'file', 'max:20480', 'mimes:jpg,jpeg,png,webp,mp4,webm,ogg'],
            'media_url' => ['nullable', 'string', 'max:2048'],

            'remove_media' => ['nullable'],

            'media_width'  => ['nullable', 'integer', 'min:1', 'max:10000'],
            'media_height' => ['nullable', 'integer', 'min:1', 'max:10000'],
        ]);

        $type = isset($data['type']) ? (string) $data['type'] : (string) $post->type;
        $text = array_key_exists('text', $data) ? trim((string) $data['text']) : (string) ($post->text ?? '');

        $removeMedia = $this->isTruthy($request->input('remove_media'));
        $hasFile = $request->hasFile('media');
        $url = isset($data['media_url']) ? trim((string) $data['media_url']) : '';

        if ($type === 'note' && $text === '') {
            return response()->json(['message' => 'El texto es obligatorio en un post tipo note'], 422);
        }

        // Si suben fichero, valida que encaje con type (simple)
        if ($hasFile) {
            $file = $request->file('media');
            $mime = (string) ($file?->getMimeType() ?? '');

            if ($type === 'screenshot' && !str_starts_with($mime, 'image/')) {
                return response()->json(['message' => 'El archivo debe ser una imagen para screenshot'], 422);
            }

            if ($type === 'clip' && !str_starts_with($mime, 'video/')) {
                return response()->json(['message' => 'El archivo debe ser un vídeo para clip'], 422);
            }
        }

        $post->type = $type;
        $post->text = ($text !== '') ? $text : null;

        // Gestión de media según el tipo de post: nota, clip o screenshot
        if ($type === 'note') {
            if ($post->media_url) $this->deletePostMediaIfLocal($post->media_url);

            $post->media_url = null;
            $post->media_width = null;
            $post->media_height = null;
        } else {
            if ($removeMedia) {
                if ($post->media_url) $this->deletePostMediaIfLocal($post->media_url);

                $post->media_url = null;
                $post->media_width = null;
                $post->media_height = null;
            } elseif ($url !== '') {
                if ($post->media_url) $this->deletePostMediaIfLocal($post->media_url);

                $post->media_url = $url;
                $post->media_width = $data['media_width'] ?? $post->media_width;
                $post->media_height = $data['media_height'] ?? $post->media_height;
            } elseif ($hasFile) {
                if ($post->media_url) $this->deletePostMediaIfLocal($post->media_url);

                $file = $request->file('media');
                $folder = ($type === 'clip') ? 'posts/clips' : 'posts/screenshots';

                $ext = strtolower($file->getClientOriginalExtension() ?: ($type === 'clip' ? 'mp4' : 'jpg'));
                $filename = 'p' . $userId . '_' . time() . '_' . Str::random(8) . '.' . $ext;

                $path = $file->storeAs($folder, $filename, 'public');
                $post->media_url = $path;

                // Dimensiones si es imagen y no vienen
                if ($type === 'screenshot') {
                    $post->media_width = $data['media_width'] ?? $post->media_width;
                    $post->media_height = $data['media_height'] ?? $post->media_height;

                    if (!$post->media_width || !$post->media_height) {
                        $realPath = $file->getRealPath();
                        if ($realPath) {
                            $size = @getimagesize($realPath);
                            if (is_array($size)) {
                                $post->media_width = $post->media_width ?: (int) $size[0];
                                $post->media_height = $post->media_height ?: (int) $size[1];
                            }
                        }
                    }
                }
            }

            $hasFinalMedia = trim((string) ($post->media_url ?? '')) !== '';
            if (!$hasFinalMedia) {
                return response()->json(['message' => 'Un post tipo screenshot/clip necesita media (archivo o URL)'], 422);
            }
        }

        $post->save();

        $out = Post::query()
            ->where('id', $post->id)
            ->with(['game:id,title,slug,cover_url,cover_thumb_url,release_date'])
            ->withCount(['likes', 'comments'])
            ->first();

        if ($out) {
            $out->media_url = $this->publicPostMediaUrl($out->media_url, $out->type);
        }

        return response()->json(['post' => $out]);
    }

    public function deletePost(int $id)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $post = Post::query()->where('id', $id)->first();
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        if ((int) $post->user_id !== (int) $userId) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $this->deletePostMediaIfLocal($post->media_url);

        $post->delete(); // soft delete
        return response()->json(['deleted' => true]);
    }

    /*  HELPERS */

    /**
     * Borra el archivo de media de un post solo si es local.
     */
    private function deletePostMediaIfLocal(?string $mediaUrl): void
    {
        $m = trim((string) ($mediaUrl ?? ''));
        if ($m === '') return;

        // No tocar URLs externas ni data:
        if (preg_match('#^(https?:)?//#i', $m) || str_starts_with($m, 'data:')) {
            return;
        }

        $m = str_replace('\\', '/', ltrim($m, '/'));

        // Si por lo que sea viene como storage/...
        if (str_starts_with($m, 'storage/')) {
            $m = substr($m, strlen('storage/'));
        }

        if (Storage::disk('public')->exists($m)) {
            Storage::disk('public')->delete($m);
        }
    }

    /**
     * Limita un entero para que siempre quede dentro del rango.
     */
    private function clampInt(int $value, int $min, int $max): int
    {
        return max($min, min($max, $value));
    }

    /**
     * Interpreta 1 y "1" como true y “true”.
     */
    private function isTruthy($v): bool
    {
        return ($v === '1' || $v === 1 || $v === true || $v === 'true');
    }
}
