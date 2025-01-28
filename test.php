<?php
require_once __DIR__ . '/vendor/autoload.php';
use MongoDB\Client;

try {
    $client = new Client("mongodb://localhost:27017");
    $database = $client->selectDatabase('Cookooning');
    $collection = $database->selectCollection('test');

    // Insérez un document de test
    $result = $collection->insertOne([
        'message' => 'MongoDB est configuré correctement !',
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    echo 'Document inséré avec l\'ID : ' . $result->getInsertedId();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}