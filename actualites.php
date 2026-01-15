<?php include __DIR__ . "/php/database.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualité<script type="module" src=""></script></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/actualites.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>

<body>
    <?php include 'php/components/header.php'; ?>
    <div class="actualites-container">
        <header class="actualites-header">
            <h1>Actualités</h1>
        </header>
        <section class="actualites-filtres">
            <button class="filtre">Filtre</button>
            <button class="filtre">Filtre</button>
            <button class="filtre">Filtre</button>
            <button class="filtre">Filtre</button>
        </section>
        <main class="actualites-main">
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