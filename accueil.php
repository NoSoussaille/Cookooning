<?php
require_once 'elements/header.php';
require_once 'elements/db-connexion.php';

// Récupération des recettes avec pagination
$recipesPerPage = 6; // Nombre de recettes par page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $recipesPerPage;

// Récupère le nombre total de recettes
$queryTotal = "SELECT COUNT(*) as total FROM recettes";
$resultTotal = $mysqli->query($queryTotal);

if ($resultTotal) {
    $totalRecipes = $resultTotal->fetch_assoc()['total'];
} else {
    $totalRecipes = 0; // Par défaut, 0 si la requête échoue
}

// Calcul du nombre total de pages
$totalPages = ceil($totalRecipes / $recipesPerPage);

// Récupère les recettes pour la page actuelle
$query = "SELECT * FROM recettes LIMIT ?, ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ii", $offset, $recipesPerPage);
$stmt->execute();
$result = $stmt->get_result();

// Collecte les recettes dans un tableau
$recipes = [];
while ($recipe = $result->fetch_assoc()) {
    $recipes[] = $recipe;
}

// Libérer les ressources
$stmt->close();
$mysqli->close();
?>

<main>
    <div class="mini-title">
        <h2 class="title2">Liste des recettes</h2>
    </div>
    
    <div class="recipes">
    <?php if (!empty($recipes)): ?>
    <?php foreach ($recipes as $recipe): ?>
        <div class="recipe">
            <!-- Affiche l'image (toujours protéger le src) -->
            <img src="<?= htmlspecialchars($recipe['image']); ?>" 
                 alt="<?= html_entity_decode($recipe['titre'], ENT_QUOTES, 'UTF-8'); ?>" 
                 class="recipe-img">

            <!-- Titre décodé -->
            <h3><?= html_entity_decode($recipe['titre'], ENT_QUOTES, 'UTF-8'); ?></h3>

            <!-- Description décodée -->
            <p><?= html_entity_decode($recipe['description'], ENT_QUOTES, 'UTF-8'); ?></p>

            <!-- Lien (l'ID étant numérique, on peut se contenter d'un htmlspecialchars, 
                 ou même l'afficher sans transformation) -->
            <a href="recette.php?id=<?= htmlspecialchars($recipe['id']); ?>">Afficher plus</a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucune recette n'est disponible.</p>
<?php endif; ?>
    </div>
    <div class="pagination">
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1; ?>" class="btn">Précédent</a>
        <?php endif; ?>
        
        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?= $currentPage + 1; ?>" class="btn">Suivant</a>
        <?php endif; ?>
    </div>
</main>

<?php
require_once 'elements/footer.php';
?>