<?php
require_once 'elements/header.php';
require_once 'elements/db-connexion.php';

if (!isset($_SESSION['user_id'])) {
    echo '
    <div style="
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa; /* Couleur de fond douce */
        font-family: Arial, sans-serif;
        color: #2B4570;
        text-align: center;
        flex-direction: column;
    ">
        <h2 style="
            font-size: 24px;
            margin-bottom: 20px;
            color: #E49273;
        ">Vous devez être connecté pour ajouter une recette.</h2>
        <p style="
            font-size: 18px;
            margin-bottom: 30px;
        ">Veuillez <a href="login.php" style="
            color: #2B4570;
            text-decoration: underline;
            font-weight: bold;
        ">vous connecter</a> ou <a href="register.php" style="
            color: #2B4570;
            text-decoration: underline;
            font-weight: bold;
        ">créer un compte</a> pour continuer.</p>
        <a href="accueil.php" style="
            display: inline-block;
            padding: 10px 20px;
            background-color: #E49273;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease;
        " onmouseover="this.style.backgroundColor=\'#C87A5E\'" onmouseout="this.style.backgroundColor=\'#E49273\'">Retour à la page d\'accueil</a>
    </div>';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération de l'utilisateur connecté
    $utilisateur_id = $_SESSION['user_id'];

    // Vérification et récupération des données du formulaire
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $preparation = htmlspecialchars($_POST['preparation']);
    $ingredients = $_POST['ingredients']; // Tableau des ingrédients (champ dynamique)

    // Gestion de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imagePath = 'images/image_recette/' . $imageName;

        // Déplacer l'image dans le dossier approprié
        if (move_uploaded_file($imageTmp, $imagePath)) {
            // Insérer la recette dans la base de données
            $query = "INSERT INTO recettes (titre, description, preparation, image, utilisateur_id, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ssssi", $titre, $description, $preparation, $imagePath, $utilisateur_id);

            if ($stmt->execute()) {
                $recetteId = $stmt->insert_id; // Récupère l'ID de la recette ajoutée

                // Insérer les ingrédients
                $queryIngredient = "INSERT INTO ingredients (recette_id, nom, quantite, created_at) VALUES (?, ?, ?, NOW())";
                $stmtIngredient = $mysqli->prepare($queryIngredient);
                foreach ($ingredients as $ingredient) {
                    $ingredientName = htmlspecialchars($ingredient['nom']);
                    $ingredientQuantity = htmlspecialchars($ingredient['quantite']);
                    $stmtIngredient->bind_param("iss", $recetteId, $ingredientName, $ingredientQuantity);
                    $stmtIngredient->execute();
                }
                $stmtIngredient->close();

                echo '<p>Recette ajoutée avec succès !</p>';
            } else {
                echo '<p>Erreur lors de l\'ajout de la recette.</p>';
            }
            $stmt->close();
        } else {
            echo '<p>Erreur lors de l\'envoi de l\'image.</p>';
        }
    } else {
        echo '<p>Veuillez télécharger une image valide.</p>';
    }
}

$mysqli->close();
?>

<main>
    <div class="mini-title">
        <h2 class="title2">Ajouter une recette</h2>
    </div>
    
    <form action="addrecette.php" method="POST" enctype="multipart/form-data" class="add-recette-form">
        <!-- Titre -->
        <label for="titre">Titre de la recette</label>
        <input type="text" id="titre" name="titre" required>

        <!-- Description -->
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="3" required></textarea>

        <!-- Préparation -->
        <label for="preparation">Préparation</label>
        <textarea id="preparation" name="preparation" rows="5" required></textarea>

        <!-- Image -->
        <label for="image">Image</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <!-- Ingrédients -->
        <label>Ingrédients</label>
        <div id="ingredients-container">
        </div>
<button type="button" id="add-ingredient-btn">Ajouter un ingrédient</button>

        <!-- Bouton pour soumettre -->
        <button type="submit" class="btn">Ajouter la recette</button>
    </form>
</main>

<?php require_once 'elements/footer.php'; ?>