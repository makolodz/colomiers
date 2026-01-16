<?php include __DIR__ . "/php/database.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US Colomiers - SAE 301</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/actualites.css">
</head>
    <script src="ajax/filtre.js" defer></script>
<body>
<?php include 'php/components/header.php'; ?>
    <div class="actualites-container">
        <header class="actualites-header">
            <h1>Actualités</h1>
        </header>
        <section class="actualites-filtres">
            <button class="filtre" data-categorie="">Toutes</button>
            <button class="filtre" data-categorie="club">Club</button>
            <button class="filtre" data-categorie="match">Match</button>
            <button class="filtre" data-categorie="formation">Formation</button>

        </section>
        <main class="actualites-main" id=articles>
            <div class="actualites-row">
                <div class="actualites-item" data-categorie='club'>
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
            </div>
            <div class="actualites-row">
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article"></div>
                    <p>Titre article - auteur</p>
                </div>
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
            </div>
            <div class="actualites-row">
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
                <div class="actualites-item">
                    <div class="actualites-image">
                        <img src="actualites1.webp" alt="Image de l'article">
                    </div>
                    <p>Titre article - auteur</p>
                </div>
            </div>
        </main>
    </div>
    <?php include 'php/components/footer.php'; ?>
</body>
</html>