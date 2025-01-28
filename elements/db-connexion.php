<?php
    // Informations de connexion
// Récupération des variables d'environnement
$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER');
$db_password = getenv('DB_PASSWORD');
$db_db = getenv('DB_DATABASE');
    
    // Création de la connexion
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_db);
        
    // Vérification des erreurs
    if ($mysqli->connect_error) {
        die('Erreur de connexion MySQLi : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
?>