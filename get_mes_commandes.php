<?php
require 'db_connect.php';

$client_id = $_GET['client_id']; 

$stmt = $conn->prepare("SELECT * FROM commandes WHERE client_id = ? ORDER BY date_commande DESC");
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();

$commandes = array();
while($row = $result->fetch_assoc()) {
    $commandes[] = $row;
}

echo json_encode($commandes);
$conn->close();
?>