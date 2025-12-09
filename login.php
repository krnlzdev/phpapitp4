<?php
require 'db_connect.php';

$courriel = $_POST['courriel'];
$mdp = $_POST['mot_de_passe'];

$stmt = $conn->prepare("SELECT id, nom, courriel, adresse, telephone, points FROM clients WHERE courriel = ? AND mot_de_passe = ?");
$stmt->bind_param("ss", $courriel, $mdp);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array("success" => true, "client" => $row));
} else {
    echo json_encode(array("success" => false, "message" => "Identifiants incorrects"));
}

$stmt->close();
$conn->close();
?>