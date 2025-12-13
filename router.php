<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {

    case '/':
        require DIR . '/index.php';
        break;

    case '/api/users':
        require DIR . '/api/users.php';
        break;

    default:
        http_response_code(404);
        echo json_encode([
            "error" => "Route not found",
            "path" => $uri
        ]);
}