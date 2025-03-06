<?php
// filepath: /c:/Users/Utilisateur/Desktop/Portfolio/Contacts/process_form.php

// Informations de connexion à la base de données
$servername = "50100";
$username = "silv0053"; // Remplacez par votre nom d'utilisateur MySQL
$password = "zGhJjHT5Ms"; // Remplacez par votre mot de passe MySQL
$dbname = "portfolio";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$sujet = $_POST['sujet'];
$message = $_POST['message'];

// Préparer et exécuter la requête SQL
$sql = "INSERT INTO messages (nom, email, sujet, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nom, $email, $sujet, $message);

if ($stmt->execute()) {
    echo "Message envoyé avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>