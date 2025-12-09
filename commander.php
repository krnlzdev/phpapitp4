<?php
header('Content-Type: application/json');
require 'db_connect.php';

$client_id = $_POST['client_id'];
$nom_client = $_POST['nom_client'];
$montant = $_POST['montant']; 
$points_utilises = isset($_POST['points_utilises']) ? $_POST['points_utilises'] : 0; 

$stmt = $conn->prepare("INSERT INTO commandes (client_id, nom_client, montant_total) VALUES (?, ?, ?)");
$stmt->bind_param("isd", $client_id, $nom_client, $montant);

if ($stmt->execute()) {
    $points_gagnes = intval($montant * 10);
    
    $update = $conn->prepare("UPDATE clients SET points = points - ? + ? WHERE id = ?");
    $update->bind_param("iii", $points_utilises, $points_gagnes, $client_id);
    $update->execute();

    echo json_encode(array("success" => true, "message" => "Commande reçue !", "points_gagnes" => $points_gagnes));
} else {
    echo json_encode(array("success" => false, "message" => "Erreur lors de la commande"));
}

$conn->close();
?>