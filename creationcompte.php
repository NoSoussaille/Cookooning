<?php
require_once "elements/db-connexion.php";
require_once "elements/header.php";
?>
<div class="form-container">
    <h3>Création de compte</h3>

    <?php if (isset($_GET['error'])): ?>
        <div class="error-message">
            <?php if ($_GET['error'] === 'missing_fields'): ?>
                Tous les champs sont obligatoires.
            <?php elseif ($_GET['error'] === 'invalid_email'): ?>
                Adresse email invalide.
            <?php elseif ($_GET['error'] === 'email_taken'): ?>
                Cet email est déjà utilisé.
            <?php elseif ($_GET['error'] === 'insert_failed'): ?>
                Erreur lors de la création du compte. Veuillez réessayer.
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['success']) && $_GET['success'] === 'account_created'): ?>
        <div class="success-message">Compte créé avec succès. Vous pouvez maintenant vous connecter.</div>
    <?php endif; ?>

    <form action="elements/addutilisateur.php" method="POST" onsubmit="return validatePasswords()">
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        </div>

        <div class="form-group">
            <label for="password2">Confirmer le mot de passe</label>
            <input type="password" id="password2" name="password2" placeholder="Confirmer le mot de passe" required>
            <p id="password-error"></p>
        </div>

        <button type="submit" class="btnCo">Créer un compte</button>
    </form>

    <div class="form-footer">
        <a class="forgot-password" href="connexion.php">Déjà un compte ? Connectez-vous</a>
    </div>
</div>

<script>
    function validatePasswords() {
        const password = document.getElementById("password").value;
        const password2 = document.getElementById("password2").value;
        const errorContainer = document.getElementById("password-error");

        errorContainer.textContent = "";

        if (password !== password2) {
            errorContainer.textContent = "Les mots de passe ne correspondent pas.";
            return false;
        }

        return true;
    }
</script>
<?php
require_once 'elements/footer.php';
?>