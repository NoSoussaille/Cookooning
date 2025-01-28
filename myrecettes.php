<?php
require_once 'elements/header.php';
require_once 'elements/db-connexion.php';

if (!isset($_SESSION['user_id'])) {
    die('<p>Vous devez être connecté pour voir vos recettes.</p>');
}

$userId = $_SESSION['user_id'];

// Suppression d'une recette si demandé
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = (int)$_POST['delete_id'];

    // Supprime la recette de la base de données
    $stmt = $mysqli->prepare("DELETE FROM recettes WHERE id = ? AND utilisateur_id = ?");
    $stmt->bind_param("ii", $deleteId, $userId);
    $stmt->execute();
    $stmt->close();
}

// Récupération des recettes avec pagination
$recipesPerPage = 6; // Nombre de recettes par page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $recipesPerPage;

// Récupère le nombre total de recettes de l'utilisateur
$queryTotal = "SELECT COUNT(*) as total FROM recettes WHERE utilisateur_id = ?";
$stmt = $mysqli->prepare($queryTotal);
$stmt->bind_param("i", $userId);
$stmt->execute();
$resultTotal = $stmt->get_result();

if ($resultTotal) {
    $totalRecipes = $resultTotal->fetch_assoc()['total'];
} else {
    $totalRecipes = 0;
}
$stmt->close();

// Calcul du nombre total de pages
$totalPages = ceil($totalRecipes / $recipesPerPage);

// Récupère les recettes pour la page actuelle
$query = "SELECT * FROM recettes WHERE utilisateur_id = ? LIMIT ?, ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("iii", $userId, $offset, $recipesPerPage);
$stmt->execute();
$result = $stmt->get_result();

$recipes = [];
while ($recipe = $result->fetch_assoc()) {
    $recipes[] = $recipe;
}

$stmt->close();
$mysqli->close();
?>

<main>
    <div class="mini-title">
        <h2 class="title2">Mes recettes</h2>
    </div>

    <div class="recipes">
        <?php if (!empty($recipes)): ?>
            <?php foreach ($recipes as $recipe): ?>
                <div class="recipe">
                    <!-- Gestion de l'image -->
                    <img 
                        src="<?= htmlspecialchars($recipe['image'] ?? 'images/default-recipe.jpg'); ?>" 
                        alt="<?= htmlspecialchars($recipe['titre'] ?? 'Recette sans titre'); ?>" 
                        class="recipe-img">

                    <!-- Titre de la recette -->
                    <h3><?= htmlspecialchars($recipe['titre'] ?? 'Recette sans titre'); ?></h3>

                    <!-- Description de la recette -->
                    <p><?= htmlspecialchars($recipe['description'] ?? 'Aucune description disponible.'); ?></p>

                    <!-- Lien vers la recette -->
                    <a href="recette.php?id=<?= htmlspecialchars($recipe['id']); ?>" class="btn">Afficher plus</a>

                    <!-- Formulaire de suppression -->
                    <form action="myrecettes.php" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette recette ?');">
                        <input type="hidden" name="delete_id" value="<?= htmlspecialchars($recipe['id']); ?>">
                        <button type="submit" class="btn btn-delete">Supprimer</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune recette trouvée.</p>
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

<?php require_once 'elements/footer.php'; ?>

