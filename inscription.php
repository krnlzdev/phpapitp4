<?php
require 'db_connect.php';

$nom = $_POST['nom'];
$courriel = $_POST['courriel'];
$mdp = $_POST['mot_de_passe'];
$adresse = $_POST['adresse'];
$tel = $_POST['telephone'];

if(empty($nom) || empty($courriel) || empty($mdp)) {
    echo json_encode(array("success" => false, "message" => "Champs manquants"));
    exit();
}

$stmt = $conn->prepare("INSERT INTO clients (nom, courriel, mot_de_passe, adresse, telephone, points) VALUES (?, ?, ?, ?, ?, 0)");
$stmt->bind_param("sssss", $nom, $courriel, $mdp, $adresse, $tel);

if ($stmt->execute()) {
    echo json_encode(array("success" => true, "message" => "Compte créé !"));
} else {
    echo json_encode(array("success" => false, "message" => "Erreur (Email déjà utilisé ?)"));
}

$stmt->close();
$conn->close();
?>