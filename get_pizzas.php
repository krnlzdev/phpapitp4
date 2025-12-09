<?php
require 'db_connect.php';

$sql = "SELECT * FROM pizzas";
$result = $conn->query($sql);

$pizzas = array();

while($row = $result->fetch_assoc()) {
    $pizzas[] = $row;
}

echo json_encode($pizzas);
$conn->close();
?>