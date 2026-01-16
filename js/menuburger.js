/* VARIABLES */
   let burgerMenu; // Les 3 barres
   let navLinks;   // La liste des liens
   
   
   /* LES ACTIONS */

   function toggleMenu(event) {
       // On dit au menu de se montrer 
       navLinks.classList.toggle('active');
       
       // On dit au bouton de changer de forme
       burgerMenu.classList.toggle('open');
   }
   
   
   /* On surveille le clic sur le bouton burger */
   function setupListeners() {

       if (burgerMenu) {
           burgerMenu.addEventListener('click', toggleMenu);
       }
   }
   
   /* On récupère les éléments HTML une fois la page chargée */
   function init() {
       console.log("mmmhh... miam burger");
   
       // On remplit nos variables avec les éléments du HTML
       burgerMenu = document.getElementById('burger-toggle'); // Cherche l'ID burger-toggle
       navLinks = document.querySelector('.nav-menu ul');     // Cherche la liste du menu
       setupListeners();
   }
   
   document.addEventListener("DOMContentLoaded", init);
