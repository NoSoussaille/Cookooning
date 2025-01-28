<?php
session_start();
$isConnected = isset($_SESSION['user_id']);
$username = $isConnected && isset($_SESSION['username']) ? $_SESSION['username'] : null;
$role = $isConnected && isset($_SESSION['role']) ? $_SESSION['role'] : null;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="elements/style.css">
    <title>Cookooning</title>
</head>
<body>
<header class="main-header">
    <div class="header-container">
        <div class="header-left">
            <a href="accueil.php"><h1 class="header-title">Cookooning</h1></a>
        </div>
        <nav class="nav-menu">
            <ul class="nav-links">
                <?php if ($isConnected): ?>
                    <li><a href="addrecette.php" class="nav-link">Ajouter une recette</a></li>
                    <li><a href="myrecettes.php" class="nav-link">Mes recettes</a></li>
                    <li><a href="logout.php" class="nav-link">Se déconnecter</a></li>
                <?php else: ?>
                    <li><a href="addrecette.php" class="nav-link">Ajouter une recette</a></li>
                    <li><a href="creationcompte.php" class="nav-link">S'inscrire</a></li>
                    <li><a href="connexion.php" class="nav-link">Se connecter</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <button class="menu-toggle" aria-label="Ouvrir le menu">&#9776;</button>
    </div>
</header>