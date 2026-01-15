<?php include __DIR__ . "/php/database.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités - US Colomiers</title>
    
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<?php include 'php/components/header.php'; ?>
    
    <main class="container">
        <h1 class="page-title">Actualités</h1>
        
        <section class="filters-container">
            <button class="filter-btn active">Tout</button>
            <button class="filter-btn">Équipe 1</button>
            <button class="filter-btn">Jeunes</button>
            <button class="filter-btn">Club</button>
        </section>

        <div class="news-grid">
            <?php
            $lastactus = Database::getInstance()->loadArticles();
            
            // Boucle pour afficher toutes les actus
            foreach($lastactus as $actu) :
            ?>
            <article class="news-card">
                <img src="" alt="Image Actualité" class="news-img">
                
                <div class="news-content">
                    <h3 class="news-title"><?php echo $actu->titre; ?></h3>
                    <p class="news-meta"><?php echo $actu->categorie; ?> - <?php echo $actu->date; ?></p>
                    <a href="#" class="read-more">Lire l'article</a>
                </div>
            </article>
            <?php 
                endforeach; 
            ?>
        </div>
    </main>

    <?php include 'php/components/footer.php'; ?>
</body>
</html>