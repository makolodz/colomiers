<?php include __DIR__ . "/php/database.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National 3 - US Colomiers</title>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">

    <script src="./js/mustache.min.js" defer></script> 
    <script src="./js/classement.js"></script>
</head>

<body>
    <?php include "./php/components/header.php";?>

    <main class="container">
        
        <section class="hero-nat3">
            <h1>National 3</h1>
        </section>

        <section class="image-nat3">
            <img src="https://www.colomiersfoot.fr/Photo_20officielle_20N3_20-_20saison_202025-20261.jpg?v=234tb42gzagb22rk" alt="Équipe National 3 Saison 2025-2026">
        </section>

        <?php 
        $joueurs = Database::getInstance()->LoadJoueurs();
        ?>

        <h2 class="page-subtitle">Effectif 2025/26</h2>

        <h3 class="category-banner">Gardiens de but</h3>
        <div class="joueurs-grid"> 
            <?php foreach ($joueurs as $g): ?> 
                <?php if($g->poste == 'Gardien de but'): ?>
                    <article class="joueur-card">
                        <img src="<?= $g->photo ?>" alt="Photo <?= $g->prenom . " " . $g->nom ?>">
                        <div class="joueur-info">
                            <p class="joueur-name"><?= $g->prenom . " " . $g->nom ?></p>
                        </div>
                    </article>
                <?php endif;?>
            <?php endforeach; ?> 
        </div> 

        <h3 class="category-banner">Défenseurs</h3>
        <div class="joueurs-grid"> 
            <?php foreach ($joueurs as $d): ?> 
                <?php if($d->poste == 'Défenseur'): ?>
                    <article class="joueur-card">
                        <img src="<?= $d->photo ?>" alt="Photo <?= $d->prenom . " " . $d->nom ?>">
                        <div class="joueur-info">
                            <p class="joueur-name"><?= $d->prenom . " " . $d->nom ?></p>
                        </div>
                    </article>
                <?php endif;?>
            <?php endforeach; ?> 
        </div> 

        <h3 class="category-banner">Milieux de terrain</h3>
        <div class="joueurs-grid"> 
            <?php foreach ($joueurs as $m): ?> 
                <?php if($m->poste == 'Milieu de terrain'): ?>
                    <article class="joueur-card">
                        <img src="<?= $m->photo ?>" alt="Photo <?= $m->prenom . " " . $m->nom ?>">
                        <div class="joueur-info">
                            <p class="joueur-name"><?= $m->prenom . " " . $m->nom ?></p>
                        </div>
                    </article>
                <?php endif;?>
            <?php endforeach; ?> 
        </div> 

        <h3 class="category-banner">Attaquants</h3>
        <div class="joueurs-grid"> 
            <?php foreach ($joueurs as $a): ?> 
                <?php if($a->poste == 'Attaquant'): ?>
                    <article class="joueur-card">
                        <img src="<?= $a->photo ?>" alt="Photo <?= $a->prenom . " " . $a->nom ?>">
                        <div class="joueur-info">
                            <p class="joueur-name"><?= $a->prenom . " " . $a->nom ?></p>
                        </div>
                    </article>
                <?php endif;?>
            <?php endforeach; ?> 
        </div> 


        <section class="section-stats">
            <div class="stat-row">
                <div class="stat-container">
                    <h2 class="section-title">Classement</h2>
                    <div id="classement">

                    </div>
                </div>
            </div>
            <!-- on avait les buteurs mais aucune api n'a les données (trop basse division) -->
        </section>

    </main>

    <?php include "./php/components/footer.php"; ?>
</body>
</html> 

<!-- template Mustache -->
<script id="templateClassement" type="text/html">
    <ul>
        {{ #. }}
            <li> {{position}} {{nom}} {{points}} </li>
        {{ /. }}
    </ul>
</script>