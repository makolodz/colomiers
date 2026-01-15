// Sélectionne tous les boutons "Modifier"

function setupListeners() {

    let editArticleButtons = document.querySelectorAll('.btn-article-edit');
    let editArticleTitle = document.getElementById('titre-article-edit');
    let formlist = document.querySelectorAll('.edit-simulation-area');

    editArticleButtons.forEach(button => {
        button.addEventListener('click', () => {

            let form = document.getElementById('edit-article')

            // Récupère les données de l'article depuis les data-attributes
            let articleId = button.dataset.id;
            let titre = button.dataset.titre;
            let taxonomie = button.dataset.taxonomie;
            let texte = button.dataset.texte;

            formlist.forEach(formItem => {
                formItem.classList.remove("hidden");
            });

            // Remplit les champs du formulaire
            form.querySelector('input[name="id"]').value = articleId;
            form.querySelector('input[name="titre"]').value = titre;
            form.querySelector('input[name="taxonomie"]').value = taxonomie;
            form.querySelector('textarea[name="texte"]').value = texte;
            editArticleTitle.innerHTML = titre;
        });
    });
}

document.addEventListener("DOMContentLoaded", setupListeners);