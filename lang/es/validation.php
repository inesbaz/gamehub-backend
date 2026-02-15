<?php

return [
    
    'custom' => [
        'name' => [
            'required' => 'El nombre es obligatorio',
            'string'   => 'El nombre debe ser un texto',
            'min'      => 'El nombre debe tener al menos :min caracteres',
            'max'      => 'El nombre no puede superar los :max caracteres',
        ],

        'username' => [
            'required' => 'El nombre de usuario es obligatorio',
            'string'   => 'El nombre de usuario debe ser un texto',
            'regex'    => 'El nombre de usuario debe tener entre 3 y 20 caracteres y solo puede contener letras, números y guiones bajos (_)',
            'unique'   => 'Este nombre de usuario ya está en uso',
        ],

        'email' => [
            'required' => 'El correo electrónico es obligatorio',
            'email'    => 'Debes introducir un correo electrónico válido',
            'unique'   => 'Este correo electrónico ya está registrado',
        ],

        'password' => [
            'required'  => 'La contraseña es obligatoria',
            'string'    => 'La contraseña debe ser un texto',
            'min'       => 'La contraseña debe tener al menos :min caracteres',
            'confirmed' => 'La confirmación de la contraseña no coincide',
        ],

        'avatar_url' => [
            'url' => 'La URL del avatar debe ser una URL válida',
        ],

        'country' => [
            'string' => 'El país debe ser un texto',
            'size'   => 'El país debe tener exactamente :size caracteres (código ISO 3166-1 alfa-2, p. ej., ES)',
        ],

        'birthdate' => [
            'date'            => 'La fecha de nacimiento debe ser una fecha válida',
            'before_or_equal' => 'Debes tener al menos 13 años (fecha igual o anterior a :date)',
        ],
    ],

    'attributes' => [
        'name'                  => 'nombre',
        'username'              => 'nombre de usuario',
        'email'                 => 'correo electrónico',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de contraseña',
        'avatar_url'            => 'URL del avatar',
        'country'               => 'país',
        'birthdate'             => 'fecha de nacimiento',
    ],

];
