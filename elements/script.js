//SUPRESSION DES AVIS
document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll(".btn-delete");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            const avisId = this.getAttribute("data-id");   // Récupère l'ObjectId sous forme de string
            const avisDiv = this.closest(".avis");

            if (confirm("Voulez-vous vraiment supprimer cet avis ?")) {
                fetch("elements/delete_avis.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    // On transmet la session, nécessaire si 'delete_avis.php' 
                    // vérifie $_SESSION['role']
                    credentials: "same-origin",

                    body: `avis_id=${avisId}`
                })
                .then(response => {
                    // Debug : on peut regarder la "raw response"
                    // console.log("Raw response:", response);
                    return response.json();
                })
                .then(data => {
                    console.log("Data received:", data); // Debug

                    if (data.status === "success") {
                        avisDiv.remove(); // Supprime l'avis de la page
                    } else {
                        alert("Erreur : " + data.message);
                    }
                })
                .catch(error => {
                    console.error("Erreur lors de la suppression :", error);
                });
            }
        });
    });
});
//FIN

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

// Div d'ajout de recette réussis

    // Attendre que le DOM soit chargé
    document.addEventListener("DOMContentLoaded", () => {
        // Sélectionne l'élément avec la classe "success-message"
        const message = document.querySelector(".success-message");

        // Si le message existe, le faire disparaître après 10 secondes
        if (message) {
            setTimeout(() => {
                message.style.opacity = "0"; // Réduit l'opacité à 0
                setTimeout(() => message.remove(), 500); // Supprime complètement après l'animation
            }, 10000); // 10 secondes
        }
    });

// FIN


