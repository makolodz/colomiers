
<?php include __DIR__ . "/php/database.php" ?>
<!-- verification du cache 1 fois par semaine -->
<?php
$cacheFile = __DIR__ . "/php/api/classement_colomiers.json";
$maxAge = 7 * 24 * 60 * 60;

if (!file_exists($cacheFile) || time() - filemtime($cacheFile) > $maxAge) {
    include __DIR__ . "/php/api/update_classement_colomiers.php";
}
?>


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
        <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/national3.css">
</head>

<body>
    <main>
    <?php include "./php/components/header.php";?>

    <section class="hero-nat3">
            <h1>National 3</h1>
    </section>

      <section class="image-nat3">
        <img src="https://www.colomiersfoot.fr/Photo_20officielle_20N3_20-_20saison_202025-20261.jpg?v=234tb42gzagb22rk" alt="National 3">
</section>

<?php 


$joueurs = Database::getInstance()->LoadJoueurs();



?>

<h2>Effectif 2025/26</h2>

<h3>Gardiens de but</h3>
<div class="joueurs-grid"> <?php foreach ($joueurs as $g): ?> 
  <?php if($g->poste == 'Gardien de but'): ?>
    <div class="joueur-card">
      <img src="<?= $g->photo ?>" alt="Photo <?= $g->photo ?>">
      <p><?= $g->prenom . " " . $g->nom ?></p>
    </div>
    <?php endif;?>
  <?php endforeach; ?> 
</div> 
<h3>Défenseurs</h3>
<div class="joueurs-grid"> <?php foreach ($joueurs as $d): ?> 
  <?php if($d->poste == 'Défenseur'): ?>
    <div class="joueur-card">
      <img src="<?= $d->photo ?>" alt="Photo <?= $d->photo ?>">
      <p><?= $d->prenom . " " . $d->nom ?></p>
    </div>
    <?php endif;?>
  <?php endforeach; ?> 
</div> 

<h3>Milieux de terrain</h3>
<div class="joueurs-grid"> <?php foreach ($joueurs as $m): ?> 
  <?php if($m->poste == 'Milieu de terrain'): ?>
    <div class="joueur-card">
      <img src="<?= $m->photo ?>" alt="Photo <?= $m->photo ?>">
      <p><?= $m->prenom . " " . $m->nom ?></p>
    </div>
    <?php endif;?>
  <?php endforeach; ?> 
</div> 

<h3>Attaquants</h3>
<div class="joueurs-grid"> <?php foreach ($joueurs as $a): ?> 
  <?php if($a->poste == 'Attaquant'): ?>
    <div class="joueur-card">
      <img src="<?= $a->photo ?>" alt="Photo <?= $a->photo ?>">
      <p><?= $a->prenom . " " . $a->nom ?></p>
    </div>
    <?php endif;?>
  <?php endforeach; ?> 
</div> 


    <section class="section-stats">
    <div class="stat-container">
        <h2>Classement</h2>

        <div class="affichage-classement">
<?php
if (file_exists($cacheFile)) {
    $classement = json_decode(file_get_contents($cacheFile), true);
?>
    <p class="nom-equipe"><strong><?= $classement['team'] ?></strong></p>
    <p>Classement : <?= $classement['rank'] ?>ᵉ</p>
    <p>Points : <?= $classement['points'] ?></p>
    <p>Matchs joués : <?= $classement['played'] ?></p>
    <p>Victoires : <?= $classement['wins'] ?></p>
    <p>Nuls : <?= $classement['draws'] ?></p>
    <p>Défaites : <?= $classement['losses'] ?></p>
    <p>Différence de buts : <?= $classement['goal_diff'] ?></p>
    <small>Mise à jour : <?= $classement['last_update'] ?></small>
<?php } else { ?>
    <p>Classement indisponible.</p>
<?php } ?>

</div>

    </div>

    <div class="stat-container">
        <h2>Calendrier</h2>
        <div class="affichage-calendrier">
            </div>
    </div>

    <div>
        <h2>Meilleurs Buteurs</h2>
        <div class="liste-buteurs">
            <div class="fiche-buteur">
                <div class="photo-buteur"></div>
                <p class="infos-buteur">Nom Prénom - 0 Buts</p>
            </div>
            <div class="fiche-buteur">
                <div class="photo-buteur"></div>
                <p class="infos-buteur">Nom Prénom - 0 Buts</p>
            </div>
            <div class="fiche-buteur">
                <div class="photo-buteur"></div>
                <p class="infos-buteur">Nom Prénom - 0 Buts</p>
            </div>
        </div>
    </div>
</section>

    <?php include "./php/components/footer.php"; ?>

    </main>
</body>

</html>