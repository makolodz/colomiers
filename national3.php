<?php include __DIR__ . "/php/database.php" ?>

<?php 

$joueurs = Database::getInstance()->LoadJoueurs(); /*on charge les joueurs*/ 

?>


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
                <div class="image-nat3" alt="Équipe National 3 Saison 2025-2026"></div>
        </section>
        
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

        <h2 class="page-subtitle">Effectif 2025/26</h2>

        <h3 class="category-banner">Gardiens de but</h3> <!-- 4 catégories différentes afin de sérparer les postes-->
        <div class="joueurs-grid">
            <?php foreach ($joueurs as $g): ?> 
                <?php if($g->poste == 'Gardien de but'): ?>
                    <article class="joueur-card">
                        <img src="<?php echo "./php/api/images/joueur/" . $g->photo;?>" alt="Photo <?= $g->prenom . " " . $g->nom ?>">
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
                        <img src="<?php echo "./php/api/images/joueur/" . $d->photo;?>" alt="Photo <?= $d->prenom . " " . $d->nom ?>">
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
                        <img src="<?php echo "./php/api/images/joueur/" . $m->photo;?>" alt="Photo <?= $m->prenom . " " . $m->nom ?>">
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
                        <img src="<?php echo "./php/api/images/joueur/" . $a->photo;?>" alt="Photo <?= $a->prenom . " " . $a->nom ?>">
                        <div class="joueur-info">
                            <p class="joueur-name"><?= $a->prenom . " " . $a->nom ?></p>
                        </div>
                    </article>
                <?php endif;?>
            <?php endforeach; ?> 
        </div> 
    </main>

    <?php include "./php/components/footer.php"; ?>
</body>
</html> 

<!-- template Mustache -->
<script id="templateClassement" type="text/html">
    <table class="classement-table">
        <thead>
            <tr>
                <th class="rank-head">Pos</th>
                <th class="team-head">Équipe</th>
                <th class="pts-head">Pts</th>
            </tr>
        </thead>
        <tbody>
            {{ #. }}
            <tr class="height-row-classement">
                <td class="rank-col">{{position}}</td>
                <td class="team-col">{{nom}}</td>
                <td class="points-col">{{points}}</td>
            </tr>
            {{ /. }}
        </tbody>
    </table>
</script>