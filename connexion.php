<?php
require_once "elements/db-connexion.php";
require_once "elements/header.php";
?>
    <div class="mini-title">
        <h2 class="title2">Connectez vous pour partager vos recettes</h2>
    </div>
    <form action="elements/login.php" method="POST" class="form-container">
    <fieldset>
        <div class="form-header">
            <h3>Connexion</h3>
        </div>
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p class="error-message">Email ou mot de passe invalide</p>
        <?php endif; ?>

        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        </div>
        <div class="form-footer">
            <a href="oublie.php" class="forgot-password">Mot de passe oublié</a>
        </div>
        <button type="submit" class="btnCo">Connexion</button>
        <button type="button" class="btnCo secondary-btn">
            <a href="creationcompte.php">Créer un compte</a>
        </button>
    </fieldset>
</form>
    <script>
        // Supprime le paramètre "error" de l'URL après affichage
        if (window.location.search.includes("error=1")) {
            const url = new URL(window.location);
            url.searchParams.delete("error");
            window.history.replaceState({}, document.title, url.toString());
        }

    </script>
<?php
require_once 'elements/footer.php';
?>