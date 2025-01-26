        <footer class="main-footer">
            <div class="footer-center">
                <a href="#"><h1 class="header-title">Cookooning</h1></a>
            </div><br>
            <div class="footer-left">
                <ul class="footer-link">
                    <?php if ($isConnected): ?>
                        <li><a href="#" class="fo-link">Ajouter une recette</a></li>
                        <li><a href="#" class="fo-link">Mes recettes</a></li>
                        <li><a href="logout.php" class="fo-link">Se déconnecter</a></li>
                    <?php else: ?>
                        <li><a href="#" class="fo-link">Ajouter une recette</a></li>
                        <li><a href="register.php" class="fo-link">S'inscrire</a></li>
                        <li><a href="login.php" class="fo-link">Se connecter</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="footer-right">
                <a href="https://instagram.com" target="_blank" class="social-link">
                    <img src="images/logo/insta.png" alt="Instagram" class="logo">
                </a>
                <a href="https://instagram.com" target="_blank" class="social-link">
                    <img src="images/logo/insta.png" alt="Instagram" class="logo">
                </a>
                <a href="https://instagram.com" target="_blank" class="social-link">
                    <img src="images/logo/insta.png" alt="Instagram" class="logo">
                </a>
            </div>
        </footer>
        <script src="elements/script.js"></script>
    </body>
</html>