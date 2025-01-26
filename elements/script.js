// Menu Burger
const menuToggle = document.querySelector('.menu-toggle');
const navMenu = document.querySelector('.nav-menu');

// Gérer l'ouverture/fermeture du menu burger
menuToggle.addEventListener('click', () => {
    navMenu.classList.toggle('active'); // Active/désactive le menu
});

// Fermer le menu burger lorsque l'écran passe en grand
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        navMenu.classList.remove('active'); // Désactive le menu burger en grand écran
    }
});
// Fin du menu burger

// Bouton de suppression ingredients dans addrecette.php
// Ajoute un écouteur unique au bouton "Ajouter un ingrédient"
document.getElementById('add-ingredient-btn').addEventListener('click', function () {
    const container = document.getElementById('ingredients-container');
    const count = container.children.length;

    // Crée une nouvelle div pour l'ingrédient
    const ingredientDiv = document.createElement('div');
    ingredientDiv.classList.add('ingredient');

    // Ajoute les champs pour l'ingrédient avec un bouton supprimer
    ingredientDiv.innerHTML = `
        <input type="text" name="ingredients[${count}][nom]" placeholder="Nom de l'ingrédient" required>
        <input type="text" name="ingredients[${count}][quantite]" placeholder="Quantité" required>
        <button type="button" class="remove-ingredient-btn">X</button>
    `;

    // Ajoute la div au conteneur
    container.appendChild(ingredientDiv);
});

// Gestion de la suppression des ingrédients
document.getElementById('ingredients-container').addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-ingredient-btn')) {
        e.target.parentElement.remove(); // Supprime le parent de l'ingrédient
    }
});

// Fin 

