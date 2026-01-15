<?php include __DIR__ . "/php/database.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autres équipes</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">

</head>
<?php include './php/components/header.php'; ?>
<body class="autresequipes-body">
    <div class="autresequipes-container">
        <aside class="autresequipes-aside">
            <h1 class="autresequipes-autres-equipes">Autres équipes</h1>
        </aside>
        <main>
            <section class="autresequipes-section-feminine">
                <h2>Section féminine</h2>
                <?php
                $equipes = Database::getInstance()->loadEquipe();
                $feminine = $equipes[1];
                ?>
                <div class="autresequipes-block-row">    
                <div class="autresequipes-autres-equipes">
                        <img src="image.jpg" alt="image équipe féminine">
                        <div class="autresequipes-equipe-info">
                            <strong><?= $feminine->nom ?></strong><br>
                            <a href="<?= $feminine->lien_calendrier ?>" target="_blank">Calendrier</a> |
                            <a href="<?= $feminine->lien_classement ?>" target="_blank">Classement</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="autresequipes-section-jeunes">
                <h2>Sections jeunes</h2>
                <?php foreach ($equipes as $equipe): ?>
                    <div class="autresequipes-autres-equipes">
                            <div class="autresequipes-block-block-tall">
                                    <strong><?= $equipe->nom ?></strong><br>
                                    <a href="<?= $equipe->lien_calendrier ?>" target="_blank">Calendrier</a> |
                                    <a href="<?= $equipe->lien_classement ?>" target="_blank">Classement</a>
                            </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>
    <?php include './php/components/footer.php'; ?>
</body>
</html>