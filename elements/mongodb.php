<?php
require_once __DIR__ . '/../vendor/autoload.php';
try {
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
    $db = $mongoClient->Cookooning; // Base de données
    $collectionAvis = $db->avis; // Collection des avis
} catch (Exception $e) {
    die("Erreur de connexion à MongoDB : " . $e->getMessage());
}
?>