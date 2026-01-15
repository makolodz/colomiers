<?php include __DIR__ . "/php/database.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US Colomiers Football</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include "php/components/header.php";?>

    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">US Colomiers Football</h1>
            <p class="hero-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </section>

    <section class="match-weather-container container">
        <div class="match-box">
            <div class="match-info">
                <span class="match-label">PROCHAIN MATCH - NATIONAL 3</span>
                <div class="versus">
                    <span class="team">US COLOMIERS</span>
                    <span class="vs">VS</span>
                    <span class="team">STADE BORDELAIS</span>
                </div>
                <div class="date-time">Samedi 24 Janvier - 18h00</div>
            </div>
            
            <div class="separator"></div>

            <div class="weather-info">
                <span class="weather-label">MÉTÉO DU MATCH</span>
                <div class="weather-data">
                    <span class="weather-icon">☁️</span> 
                    <span class="temperature">12°C</span>
                </div>
                <span class="weather-desc">Nuageux</span>
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Dernières Actus</h2>
            
            <div class="news-grid">
                <?php
                $lastactus = Database::getInstance()->loadArticles();
                $counter = 0;
                foreach($lastactus as $actu) :
                    $counter+=1;
                    if($counter <= 3): 
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
                    endif;
                    endforeach; 
                ?>
            </div>
        </div>
    </section>

    <section class="partners-section">
        <div class="container">
            <h2 class="section-title">Nos partenaires</h2>
            
            <div class="partners-grid">
                <?php $partners = Database::getInstance()->loadPartners();
                foreach($partners as $partner):
                ?>
                <div class="partner-box">
                    <img src="<?php echo $partner->logo;?>" alt="Partenaire" class="partner-logo">
                    <span class="partner-name"><?php echo $partner->nom?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include "php/components/footer.php"; ?>
</body>
</html>