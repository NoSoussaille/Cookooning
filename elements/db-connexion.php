<?php
    // Informations de connexion
    $db_host = 'localhost';      // Adresse du serveur
    $db_user = 'root';           // Nom d'utilisateur
    $db_password = 'root';       // Mot de passe
    $db_db = 'Cookooning';       // Nom de la base de données
    
    // Création de la connexion
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_db);
        
    // Vérification des erreurs
    if ($mysqli->connect_error) {
        die('Erreur de connexion MySQLi : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
?>