<?php include __DIR__ . "/php/database.php";

$database = Database::getInstance();
$histoires = $database->loadHistories();
$staffClub = $database->loadStaffClub();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Club - US Colomiers</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <title>Le Club</title>
</head>
<body>

<?php include "./php/components/header.php"; ?>

<main class="container">
    <h1 class="page-title">Le Club</h1>

<section id="dirigeants">
    <h2>Dirigeants</h2>
    <div class="dirigeants-grid">

        <?php foreach ($staffClub as $staff): ?>
            <?php if ( $staff->role === 'Président' || $staff->role === 'Vice-Président' ): ?>
                <article class="dirigeant">
                    <h3>
                        <?= $staff->prenom ?>
                        <?php echo $staff->nom ?>
                    </h3>
                    <p><?php echo $staff->role ?></p>
                </article>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
</section>


<section id="administration">
    <h2>Administration</h2>
    <div class="administration-grid">

        <?php foreach ($staffClub as $staff): ?>
        <?php if ( $staff->role === "Trésorier" || $staff->role === "Trésorier Adjoint" || $staff->role === "Secrétaire" ): ?>
                <article class="admin">
                    <h3>
                        <?php echo $staff->prenom ?>
                        <?php echo $staff->nom ?>
                    </h3>
                    <p><?php echo $staff->role ?></p>
                </article>
        <?php endif; ?>
        <?php endforeach; ?>

    </div>
</section>



<section id="histoire">
    <h2>Histoire</h2>

    <?php foreach ($histoires as $histoire): ?>
        <article class="admin">
            <h2><?= $histoire->titre ?></h2>
            <p><?= $histoire->texte ?></p>

            <div class="histoire-images">
                <?php if (!empty($histoire->image)): ?>
                    <img src="<?= $histoire->image ?>" alt="<?= $histoire->titre ?>">
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>
</section>


</main>

<?php include "./php/components/footer.php"; ?>
</body>
</html>