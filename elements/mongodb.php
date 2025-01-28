<?php
require_once __DIR__ . '/../vendor/autoload.php';
try {
    $mongoClient = new MongoDB\Client("mongodb+srv://marwanebelhadi:FSdtheTbPlaokgX3@cluster0.pdc90.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
    $db = $mongoClient->Cuisine; // Base de données
    $collectionAvis = $db->avis; // Collection des avis
} catch (Exception $e) {
    die("Erreur de connexion à MongoDB : " . $e->getMessage());
}
?>