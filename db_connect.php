<?php
header("Access-Control-Allow-Origin: *"); // Autorise tout le monde à accéder à l'API
header("Access-Control-Allow-Headers: *"); // Autorise tous les types de headers
header("Content-Type: application/json; charset=UTF-8"); // Force le format JSON

// 1. On essaie de récupérer la configuration depuis Render (Environment Variables)
$servername = getenv('DB_HOST');
$username   = getenv('DB_USER');
$password   = getenv('DB_PASS');
$dbname     = getenv('DB_NAME');
$port       = getenv('DB_PORT');

// 3. Connexion
$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    // On renvoie l'erreur en JSON pour que l'appli mobile comprenne
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

$conn->set_charset("utf8");
?>