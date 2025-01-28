<?php
require_once __DIR__ . '/../vendor/autoload.php';

try {
    // Récupérer l'URI MongoDB depuis les variables d'environnement
    $mongoUri = getenv('MONGODB_URI');

    // Vérifiez si la variable d'environnement est définie
    if (!$mongoUri) {
        throw new Exception('La variable d\'environnement MONGODB_URI n\'est pas définie.');
    }

    // Connexion au client MongoDB
    $mongoClient = new MongoDB\Client($mongoUri);

    // Sélection de la base de données et de la collection
    $db = $mongoClient->Cuisine; // Base de données
    $collectionAvis = $db->avis; // Collection des avis

} catch (Exception $e) {
    die("Erreur de connexion à MongoDB : " . $e->getMessage());
}
?>