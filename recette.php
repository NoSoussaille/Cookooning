<?php
require_once 'elements/header.php';
require_once 'elements/db-connexion.php';
require_once 'elements/mongodb.php';

// Vérification de l'ID de la recette dans l'URL
if (isset($_GET['id'])) {
    $recetteId = (int) $_GET['id'];

    // Récupération des informations de la recette
    $query = "SELECT * FROM recettes WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $recetteId);
    $stmt->execute();
    $result = $stmt->get_result();
    $recette = $result->fetch_assoc();

    if ($recette) {
        // Récupération des ingrédients
        $queryIngredients = "SELECT * FROM ingredients WHERE recette_id = ?";
        $stmtIngredients = $mysqli->prepare($queryIngredients);
        $stmtIngredients->bind_param("i", $recetteId);
        $stmtIngredients->execute();
        $resultIngredients = $stmtIngredients->get_result();
        $ingredients = $resultIngredients->fetch_all(MYSQLI_ASSOC);
        ?>
        


    <!-- Description -->
    <main>
    <!-- Titre de la recette -->
    <div class="mini-title">
        <h2 class="title2">
            <?= htmlspecialchars_decode($recette['titre'] ?? 'Titre non disponible', ENT_QUOTES) ?>
        </h2>
    </div>

    <!-- Image de la recette -->
    <img src="<?= htmlspecialchars($recette['image'] ?? 'images/placeholder.jpg', ENT_QUOTES, 'UTF-8') ?>" 
         alt="<?= htmlspecialchars_decode($recette['titre'] ?? 'Image non disponible', ENT_QUOTES) ?>" 
         class="recette-img">

    <!-- Description -->
    <div class="mini-title">
        <h2 class="title2">Description</h2>
    </div>
    <p class="recette-descript">
        <?= htmlspecialchars_decode($recette['description'] ?? 'Aucune description disponible.', ENT_QUOTES) ?>
    </p>

    <!-- Ingrédients -->
    <div class="mini-title">
        <h2 class="title2">Ingrédients</h2>
    </div>
    <ul class="ingredients-list">
        <?php if (!empty($ingredients)): ?>
            <?php foreach ($ingredients as $ingredient): ?>
                <li>
                    <?= htmlspecialchars_decode($ingredient['nom'] ?? 'Ingrédient inconnu', ENT_QUOTES) ?>
                    -
                    <?= htmlspecialchars_decode($ingredient['quantite'] ?? 'Quantité inconnue', ENT_QUOTES) ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucun ingrédient disponible.</li>
        <?php endif; ?>
    </ul>

    <!-- Préparation -->
    <div class="mini-title">
        <h2 class="title2">Préparation</h2>
    </div>
    <p class="recette-preparation">
        <?= nl2br(htmlspecialchars_decode($recette['preparation'] ?? 'Aucune étape de préparation disponible.', ENT_QUOTES)) ?>
    </p>

            <!-- Retour à la liste des recettes -->
            <a href="accueil.php" class="btn">Retour à la liste des recettes</a>

            <!-- Section des avis -->
            <div class="mini-title">
                <h2 class="title2">Avis des utilisateurs</h2>
            </div>
            <div class="avis-section">
                <?php
                // Récupère les avis MongoDB pour cette recette
                $avis = $collectionAvis->find(['recette_id' => $recetteId]);

                // Si le curseur n'a pas de résultats (isDead()), on affiche un message
                if ($avis->isDead()) {
                    echo '<p>Aucun avis pour cette recette. Soyez le premier à laisser un avis !</p>';
                } else {
                    // Sinon, on boucle sur chacun des avis
                    foreach ($avis as $avisItem) {
                        // Convertit l'ObjectId en string
                        $avisIdString = (string) $avisItem['_id'];
                        ?>
                        <div class="avis">
                            <h4><?= htmlspecialchars($avisItem['username'], ENT_QUOTES, 'UTF-8') ?></h4>
                            <p><?= htmlspecialchars($avisItem['texte'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p>
                                <small>Posté le :
                                    <?= $avisItem['created_at']->toDateTime()->format('d/m/Y H:i') ?>
                                </small>
                            </p>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <button class="btn-delete" data-id="<?= $avisIdString ?>">Supprimer</button>
                            <?php endif; ?>
                        </div>
                        <?php
                    } // fin foreach
                } // fin if/else
                ?>
            </div>

            <!-- Formulaire d'ajout d'avis (uniquement pour utilisateurs connectés) -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <form action="elements/addAvis.php" method="POST" class="avis-form">
                    <input type="hidden" name="recette_id" value="<?= $recetteId ?>">
                    <label for="avis">Votre avis :</label>
                    <textarea id="avis" name="avis" required></textarea>
                    <button class="btn" type="submit">Poster mon avis</button>
                </form>
            <?php else: ?>
                <p>Connectez-vous pour laisser un avis.</p>
            <?php endif; ?>
        </main>

        <?php
        // Fermeture des statements
        $stmtIngredients->close();
    } else {
        // Si aucune recette n'est trouvée
        echo '<main><h1>Recette introuvable</h1>
            <a href="accueil.php" class="btn">Retour à la liste des recettes</a></main>';
    }

    $stmt->close();
} else {
    // Si aucun ID n'est passé dans l'URL
    echo '<main><h1>Aucune recette sélectionnée</h1>
        <a href="accueil.php" class="btn">Retour à la liste des recettes</a></main>';
}

// Fermeture de la connexion MySQL
$mysqli->close();

// Inclusion du footer
require_once 'elements/footer.php';
?>