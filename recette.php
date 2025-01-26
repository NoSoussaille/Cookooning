<?php
require_once 'elements/header.php';
require_once 'elements/db-connexion.php';

// Vérifie si un ID est passé dans l'URL
if (isset($_GET['id'])) {
    $recetteId = (int) $_GET['id'];

    // Récupère les informations de la recette
    $query = "SELECT * FROM recettes WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $recetteId);
    $stmt->execute();
    $result = $stmt->get_result();
    $recette = $result->fetch_assoc();

    if ($recette) {
        // Récupère les ingrédients de la recette
        $queryIngredients = "SELECT * FROM ingredients WHERE recette_id = ?";
        $stmtIngredients = $mysqli->prepare($queryIngredients);
        $stmtIngredients->bind_param("i", $recetteId);
        $stmtIngredients->execute();
        $resultIngredients = $stmtIngredients->get_result();
        $ingredients = $resultIngredients->fetch_all(MYSQLI_ASSOC);

        // Affichage des informations de la recette
        echo '<main>';
        echo '<div class="mini-title">';
        // On décode le titre
        echo '<h2 class="title2">' . html_entity_decode($recette['titre'], ENT_QUOTES, 'UTF-8') . '</h2>';
        echo '</div>';

        // Chemin de l'image protégé par htmlspecialchars (pour le <img src>)
        echo '<img src="' . htmlspecialchars($recette['image']) . '" alt="' . html_entity_decode($recette['titre'], ENT_QUOTES, 'UTF-8') . '" class="recette-img">';

        echo '<div class="mini-title">';
        echo '<h2 class="title2">Déscription</h2>';
        echo '</div>';
        // On décode la description
        echo '<p class="recette-descript">' . html_entity_decode($recette['description'], ENT_QUOTES, 'UTF-8') . '</p>';

        // Affiche les ingrédients
        echo '<div class="mini-title">';
        echo '<h2 class="title2">Ingrédients</h2>';
        echo '</div>';
        echo '<ul class="ingredients-list">';
        foreach ($ingredients as $ingredient) {
            // On décode le nom et la quantité
            echo '<li>' 
               . html_entity_decode($ingredient['nom'], ENT_QUOTES, 'UTF-8') 
               . ' - ' 
               . html_entity_decode($ingredient['quantite'], ENT_QUOTES, 'UTF-8') 
               . '</li>';
        }
        echo '</ul>';

        // Affiche les étapes de préparation
        echo '<div class="mini-title">';
        echo '<h2 class="title2">Préparation</h2>';
        echo '</div>';
        // On décode la préparation, puis on applique nl2br si on veut gérer les retours à la ligne
        echo '<p class="recette-preparation">' 
           . nl2br(html_entity_decode($recette['preparation'], ENT_QUOTES, 'UTF-8')) 
           . '</p>';

        echo '<a href="accueil.php" class="btn">Retour à la liste des recettes</a>';
        echo '</main>';

        // Libère les ressources
        $stmtIngredients->close();
    } else {
        echo '<main><h1>Recette introuvable</h1><a href="accueil.php" class="btn">Retour à la liste des recettes</a></main>';
    }

    $stmt->close();
} else {
    echo '<main><h1>Aucune recette sélectionnée</h1><a href="accueil.php" class="btn">Retour à la liste des recettes</a></main>';
}

$mysqli->close();
require_once 'elements/footer.php';