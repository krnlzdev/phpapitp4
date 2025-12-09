<?php
$servername = "mysql-30694ee1-tp4mobile.g.aivencloud.com"; 
$username = "avnadmin";
$password = "AVNS_99o70H67C0KE0a3x6uy";
$dbname = "defaultdb"; 
$port = "23050"; 

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

$conn->set_charset("utf8");
?>