<?php include __DIR__ . "/php/database.php"; 

// Récupérer la connexion via la méthode getInstance()
$database = Database::getInstance();
$pdo = $database->getConnection();  // Récupère la connexion PDO
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
$gardiens = $pdo->query("SELECT * FROM joueur WHERE role = 'Gardien de but' ORDER BY nom")->fetchAll();
$defenseurs = $pdo->query("SELECT * FROM joueur WHERE role = 'Défenseur' ORDER BY nom")->fetchAll();
$milieux = $pdo->query("SELECT * FROM joueur WHERE role = 'Milieu de terrain' ORDER BY nom")->fetchAll();
$attaquants = $pdo->query("SELECT * FROM joueur WHERE role = 'Attaquant' ORDER BY nom")->fetchAll();
?>
<h2>Effectif 2025/26</h2>

<h3>Gardiens de but</h3>
<div class="joueurs-grid"> <?php foreach ($gardiens as $g): ?> 
    <div class="joueur-card">
      <img src="<?= $g['photo'] ?>" alt="Photo <?= $g['nom'] ?>">
      <p><?= $g['prenom'] . " " . $g['nom'] ?></p>
    </div>
  <?php endforeach; ?> 
</div> <h3>Défenseurs</h3>
<div class="joueurs-grid">
  <?php foreach ($defenseurs as $d): ?> 
    <div class="joueur-card">
      <img src="<?= $d['photo'] ?>" alt="Photo <?= $d['nom'] ?>">
      <p><?= $d['prenom'] . " " . $d['nom'] ?></p>
    </div>
  <?php endforeach; ?> 
</div>

<h3>Milieux de terrain</h3>
<div class="joueurs-grid">
  <?php foreach ($milieux as $m): ?> 
    <div class="joueur-card">
      <img src="<?= $m['photo'] ?>" alt="Photo <?= $m['nom'] ?>">
      <p><?= $m['prenom'] . " " . $m['nom'] ?></p>
    </div>
  <?php endforeach; ?> 
</div>

<h3>Attaquants</h3>
<div class="joueurs-grid">
    <?php foreach ($attaquants as $a): ?> 
    <div class="joueur-card">
      <img src="<?= $a['photo'] ?>" alt="Photo <?= $a['nom'] ?>">
      <p><?= $a['prenom'] . " " . $a['nom'] ?></p>
    </div>
  <?php endforeach; ?> 
</div>


    <?php include "./php/components/footer.php"; ?>

    </main>
</body>

</html>