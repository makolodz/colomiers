let filtres = document.querySelectorAll('.filtre');

function loadArticles(categorie = '') {
    fetch(`php/actualites_ajax.php?categorie=${encodeURIComponent(categorie)}`)
        .then(response => response.text())
        .then(html => {
            document.getElementById('articles').innerHTML = html;
        })
}

filtres.forEach(filtre => {
    filtre.addEventListener('click', () => {
        let categorie = filtre.dataset.categorie;
        loadArticles(categorie);

        filtres.forEach(f => f.classList.remove('actif'));
        filtre.classList.add('actif');
    });
});

loadArticles();
