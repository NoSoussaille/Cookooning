<?php
session_start();
require_once '../vendor/autoload.php';
require_once 'db-connexion.php';
require_once 'mongodb.php'; // connexion Mongo

header('Content-Type: application/json');

// Vérifie si l'user est admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode([
        "status" => "error",
        "message" => "not_logged_in_or_not_admin"
    ]);
    exit();
}

// Vérifie que la requête est en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avisId = $_POST['avis_id'] ?? '';

    if (empty($avisId)) {
        echo json_encode([
            "status" => "error",
            "message" => "missing_avis_id"
        ]);
        exit();
    }

    try {
        // On parse l'ObjectId
        $result = $collectionAvis->deleteOne([
            '_id' => new MongoDB\BSON\ObjectId($avisId)
        ]);

        if ($result->getDeletedCount() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "avis_not_deleted"
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => "mongodb_error: " . $e->getMessage()
        ]);
    }
    exit();
} else {
    echo json_encode([
        "status" => "error",
        "message" => "invalid_request_method"
    ]);
    exit();
}