<?php
session_start();

/* Composer Autoload */
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;


/* Instancier le Controller */
$authController = new AuthController();
/* ROUTES avec un simple tableau */
$routes = [
    'GET' => [
        '/register'   => [$authController, 'showRegister'],
        '/'   => [$authController, 'showRegister']
    ],
    'POST' => [
        '/login'      => [$authController, 'login'],
        '/register'   => [$authController, 'register']
        ]
    ];
    
    /* récupérer la méthode et l’URL */
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // var_dump($uri);
    $uri = str_replace('/smart_wallet_MVC/public', '', $uri);

/* appeler la route si elle existe */
if (isset($routes[$method][$uri])) {
    call_user_func($routes[$method][$uri]);
} else {
    http_response_code(404);
    echo "404 - Page non trouvée";
}
