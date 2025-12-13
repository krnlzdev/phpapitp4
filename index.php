<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = rtrim($uri, '/');
if ($uri === '') {
    $uri = '/';
}

switch ($uri) {

    case '/':
        echo "alo de l'api :)";
        break;

    case '/getPizzas':
        require __DIR__ . '/get_pizzas.php';
        break;

    case '/getOrders':
        require __DIR__ . '/get_mes_commandes.php';
        break;

    case '/login':
        require __DIR__ . '/login.php';
        break;

    case '/register':
        require __DIR__ . '/inscription.php';
        break;


    default:
        http_response_code(404);
        echo json_encode([
            "error" => "Route not found",
            "path" => $uri
        ]);
}
