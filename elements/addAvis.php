<?php
session_start();
require_once 'mongodb.php';
require_once '../vendor/autoload.php'; // Charger MongoDB
require_once 'db-connexion.php'; // Connexion MySQL

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: ../connexion.php?error=not_logged_in");
    exit();
}

// Vérification si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $recetteId = isset($_POST['recette_id']) ? (int) $_POST['recette_id'] : null;
    $commentaire = trim($_POST['avis']);
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username'] ?? 'Utilisateur'; // Par défaut 'Utilisateur' si `username` non défini
    $date = new \MongoDB\BSON\UTCDateTime(); // Date MongoDB actuelle

    // Vérification des champs obligatoires
    if (empty($recetteId) || empty($commentaire)) {
        header("Location: ../recette.php?id=$recetteId&error=missing_fields");
        exit();
    }

    // Vérification si la recette existe dans MySQL
    $stmt = $mysqli->prepare("SELECT id FROM recettes WHERE id = ?");
    $stmt->bind_param("i", $recetteId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        header("Location: ../accueil.php?error=recette_not_found");
        exit();
    }

    // Insertion de l'avis dans MongoDB
    try {
        $collectionAvis->insertOne([
            'recette_id' => $recetteId,
            'user_id' => $userId,
            'username' => $username,
            'texte' => $commentaire,
            'created_at' => $date,
        ]);

        // Redirection avec un message de succès
        header("Location: ../recette.php?id=$recetteId&success=avis_added");
        exit();
    } catch (Exception $e) {
        // Gestion d'erreur pour MongoDB
        header("Location: ../recette.php?id=$recetteId&error=mongodb_error");
        exit();
    }
} else {
    // Si le formulaire n'a pas été soumis correctement
    header("Location: ../accueil.php");
    exit();
}
?>