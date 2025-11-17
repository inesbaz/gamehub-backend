<?php

return [
    // Rutas del backend a las que el front puede llamar
    'paths' => ['api/*', 'register', 'login', 'logout', 'sanctum/csrf-cookie'],
    
    // Permite todos los métodos (GET, POST, etc.)
    'allowed_methods' => ['*'],
    
    // Orígenes de front permitidos
    'allowed_origins' => ['http://localhost:5173', 'http://127.0.0.1:5173'],
    
    'allowed_origins_patterns' => [],
    
    // Qué cabeceras acepta el backend
    'allowed_headers' => ['*'],
    
    // Qué cabeceras expone el backend al navegador
    'exposed_headers' => [],
    
    'max_age' => 0,
    
    // Permite enviar cookies desde el front (requests CORS)
    'supports_credentials' => true,
];
