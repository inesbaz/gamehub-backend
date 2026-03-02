<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use App\Services\SocialService;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Review;

class SocialController extends Controller
{
    /* ACTIVIDAD */

    /*
     * Muestra la actividad de los usuarios (reseñas y posts) para la página Acividad
     */
    public function showActivity(Request $request, SocialService $svc)
    {
        $userId = Auth::id();

        $perPage = (int) $request->query('per_page', 16);
        $perPage = max(8, min(40, $perPage));

        $scope = $request->query('scope', 'community');
        if (!in_array($scope, ['community', 'following', 'soulmates'], true)) $scope = 'community';

        if (!$userId && ($scope !== 'community')) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $type = $request->query('type', 'all');
        if (!in_array($type, ['all', 'post', 'review'], true)) $type = 'all';

        $sort = $request->query('sort', 'recent');
        if (!in_array($sort, ['recent', 'top'], true)) $sort = 'recent';

        $days = (int) $request->query('days', 7);
        $days = max(1, min(30, $days));

        $query = $svc->feedQuery((int) $userId, [
            'scope' => $scope,
            'type'  => $type,
            'sort'  => $sort,
            'days'  => $days,
        ]);

        $p = $query->paginate($perPage);
        $rows = $p->getCollection();

        // Emociones y aspectos para mostrar en las reseñas
        $reviewIds = $rows
            ->filter(fn($r) => $r->item_type === 'review')
            ->pluck('item_id')
            ->map(fn($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

        $emotionsMap = [];
        $aspectsMap  = [];

        if (!empty($reviewIds)) {
            $reviews = Review::query()
                ->whereIn('id', $reviewIds)
                ->with(['emotions:id,slug,name', 'aspects'])
                ->get();

            foreach ($reviews as $rv) {
                $rid = (int) $rv->id;

                $emotionsMap[$rid] = $rv->emotions
                    ? $rv->emotions->map(function ($e) {
                        return [
                            'id' => (int) $e->id,
                            'slug' => $e->slug,
                            'name' => $e->name,
                            'display_name' => $e->display_name,
                        ];
                    })->values()->all()
                    : [];

                $aspectsMap[$rid] = $rv->aspects ?? null;
            }
        }

        $p->getCollection()->transform(function ($row) use ($emotionsMap, $aspectsMap) {
            $game = null;
            if ($row->game_id !== null) {
                $game = [
                    'id'        => (int) $row->game_id,
                    'slug'      => $row->game_slug,
                    'title'     => $row->game_title,
                    'cover_url' => $row->game_cover_url,
                ];
            }

            $item = [
                'type'       => $row->item_type,
                'id'         => (int) $row->item_id,
                'created_at' => $row->created_at,
                'user' => [
                    'id'         => (int) $row->user_id,
                    'username'   => $row->username,
                    'name'       => $row->name,
                    'avatar_url' => $row->avatar_url,
                ],
                'game' => $game,
                'counts' => [
                    'likes'    => (int) ($row->likes_count ?? 0),
                    'comments' => (int) ($row->comments_count ?? 0),
                ],
                'liked_by_me' => (bool) ($row->liked_by_me ?? 0),
            ];

            if ($row->item_type === 'post') {
                $item['post'] = [
                    'type'         => $row->post_type,
                    'text'         => $row->post_text,
                    'media_url'    => $this->publicPostMediaUrl($row->media_url, $row->post_type),
                    'media_width'  => $row->media_width === null ? null : (int) $row->media_width,
                    'media_height' => $row->media_height === null ? null : (int) $row->media_height,
                ];
                $item['review'] = null;
            } else {
                $item['post'] = null;

                $rid = (int) $row->item_id;

                $item['review'] = [
                    'title'          => $row->review_title,
                    'body'           => $row->review_body,
                    'is_recommended' => $row->is_recommended === null ? null : (bool) $row->is_recommended,
                    'spoiler'        => $row->spoiler === null ? null : (bool) $row->spoiler,
                    'emotions'       => $emotionsMap[$rid] ?? [],
                    'aspects'        => $aspectsMap[$rid] ?? null,
                ];
            }

            return $item;
        });

        return $p;
    }

    /* DETALLE DEL POST */

    /*
     * Muestra el detalle de un post y sus comentarios asociados.
     */
    public function showPost(int $id, Request $request)
    {
        $userId = Auth::id();

        if ($id <= 0) {
            return response()->json(['message' => 'Parámetro inválido'], 400);
        }

        $post = Post::query()
            ->with(['user:id,username,name,avatar_url', 'game:id,slug,title,cover_url'])
            ->withCount(['likes', 'comments'])
            ->where('id', $id)
            ->whereNull('deleted_at') // coherente con feed
            ->first();

        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        $postMorph = (new Post())->getMorphClass();

        $likedByMe = Like::query()
            ->where('user_id', $userId)
            ->where('entity_type', $postMorph)
            ->where('entity_id', $post->id)
            ->exists();

        $includeComments = $request->query('include_comments', '1') !== '0';
        $commentsLimit = (int) $request->query('comments_limit', 50);
        $commentsLimit = max(1, min(200, $commentsLimit));

        $comments = [];

        if ($includeComments) {
            $commentMorph = (new Comment())->getMorphClass();

            $rows = Comment::query()
                ->where('post_id', $post->id)
                ->whereNull('deleted_at') // <- importante
                ->with(['user:id,username,name,avatar_url'])
                ->withCount('likes')
                ->orderBy('created_at', 'asc')
                ->limit($commentsLimit)
                ->get();

            $commentIds = $rows->pluck('id')->all();

            $likedMap = [];
            if (!empty($commentIds)) {
                $likedRows = Like::query()
                    ->where('user_id', $userId)
                    ->where('entity_type', $commentMorph)
                    ->whereIn('entity_id', $commentIds)
                    ->pluck('entity_id')
                    ->all();

                foreach ($likedRows as $cid) $likedMap[(int) $cid] = true;
            }

            foreach ($rows as $c) {
                $comments[] = [
                    'id' => (int) $c->id,
                    'body' => $c->body,
                    'created_at' => $c->created_at,
                    'user' => [
                        'id' => (int) $c->user->id,
                        'username' => $c->user->username,
                        'name' => $c->user->name,
                        'avatar_url' => $c->user->avatar_url,
                    ],
                    'counts' => [
                        'likes' => (int) ($c->likes_count ?? 0),
                    ],
                    'liked_by_me' => isset($likedMap[(int) $c->id]),
                ];
            }
        }

        return response()->json([
            'id' => (int) $post->id,
            'created_at' => $post->created_at,
            'user' => [
                'id' => (int) $post->user->id,
                'username' => $post->user->username,
                'name' => $post->user->name,
                'avatar_url' => $post->user->avatar_url,
            ],
            'game' => $post->game ? [
                'id' => (int) $post->game->id,
                'slug' => $post->game->slug,
                'title' => $post->game->title,
                'cover_url' => $post->game->cover_url,
            ] : null,
            'post' => [
                'type' => $post->type,
                'text' => $post->text,
                'media_url' => $this->publicPostMediaUrl($post->media_url, $post->type),
                'media_width' => $post->media_width === null ? null : (int) $post->media_width,
                'media_height' => $post->media_height === null ? null : (int) $post->media_height,
            ],
            'counts' => [
                'likes' => (int) ($post->likes_count ?? 0),
                'comments' => (int) ($post->comments_count ?? 0),
            ],
            'liked_by_me' => $likedByMe,
            'comments' => $comments,
        ]);
    }

    /**
     * Devuelve la URL pública del media de un post (clip o screenshot).
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

    /* LIKES */

    /**
     * Alterna (crea o borra) el like del usuario autenticado sobre una entidad (post, reseña o comentario).
     */
    public function toggleLike(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $type = (string) $request->input('type', '');
        $id   = (int) $request->input('id', 0);

        if (!in_array($type, ['post', 'review', 'comment'], true) || $id <= 0) {
            return response()->json(['message' => 'Parámetros inválidos'], 400);
        }

        $morph = null;

        if ($type === 'post') {
            $morph = (new Post())->getMorphClass();
            $exists = Post::query()->where('id', $id)->whereNull('deleted_at')->exists();
            if (!$exists) return response()->json(['message' => 'Post no encontrado'], 404);
        } elseif ($type === 'review') {
            $morph = (new Review())->getMorphClass();
            $exists = Review::query()->where('id', $id)->whereNull('deleted_at')->exists();
            if (!$exists) return response()->json(['message' => 'Review no encontrada'], 404);
        } else {
            $morph = (new Comment())->getMorphClass();
            $exists = Comment::query()->where('id', $id)->whereNull('deleted_at')->exists();
            if (!$exists) return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        $likeQ = Like::query()
            ->where('user_id', $userId)
            ->where('entity_type', $morph)
            ->where('entity_id', $id);

        $existing = $likeQ->first();

        $liked = false;

        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            try {
                Like::create([
                    'user_id'     => $userId,
                    'entity_type' => $morph,
                    'entity_id'   => $id,
                ]);
                $liked = true;
            } catch (QueryException $e) {
                $liked = true;
            }
        }

        $likesCount = Like::query()
            ->where('entity_type', $morph)
            ->where('entity_id', $id)
            ->count();

        return response()->json([
            'type' => $type,
            'id' => $id,
            'liked_by_me' => $liked,
            'likes_count' => (int) $likesCount,
        ]);
    }

    /* CRUD DE COMMENTARIOS */

    public function storeComment(Request $request, int $postId)
    {
        // (la ruta ya va con auth:sanctum, pero lo dejo coherente)
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $exists = Post::query()->where('id', $postId)->whereNull('deleted_at')->exists();
        if (!$exists) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        $data = $request->validate([
            'body' => ['required', 'string', 'max:5000', 'regex:/\S/'],
        ]);

        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $postId,
            'body'    => trim($data['body']),
        ]);

        $comment->load(['user:id,username,name,avatar_url']);

        return response()->json($comment, 201);
    }

    public function updateComment(Request $request, int $id)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $comment = Comment::query()->where('id', $id)->first();
        if (!$comment) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        if ((int) $comment->user_id !== (int) $user->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $data = $request->validate([
            'body' => ['required', 'string', 'max:5000', 'regex:/\S/'],
        ]);

        $comment->update(['body' => trim($data['body'])]);
        $comment->load(['user:id,username,name,avatar_url']);

        return response()->json($comment);
    }

    public function deleteComment(Request $request, int $id)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $comment = Comment::query()->where('id', $id)->first();
        if (!$comment) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        if ((int) $comment->user_id !== (int) $user->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $comment->delete();
        return response()->json(['deleted' => true]);
    }
}
