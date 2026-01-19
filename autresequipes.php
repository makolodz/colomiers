<?php include __DIR__ . "/php/database.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autres Équipes - US Colomiers</title>
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>

<body>
    <?php include './php/components/header.php'; ?>
    
    <main class="container">
        <h1 class="page-title">Autres équipes</h1>

        <?php
        // Chargement des données
        $equipes = Database::getInstance()->loadEquipes();
        
        // On isole l'équipe féminine (index 1 selon ton code précédent)
        // Vérifie bien dans ta BDD si l'ID 1 est bien les féminines
        $feminine = isset($equipes[1]) ? $equipes[1] : null;
        ?>

        <?php if($feminine): ?>
        <section class="team-category">
            <h2 class="category-banner">Section Féminine</h2>
            
            <div class="feminine-highlight">
                <article class="team-card featured-card">
                    <div class="team-icon">⚽</div> 
                    <div class="team-info">
                        <h3><?= $feminine->nom ?></h3>
                        <div class="team-links">
                            <a href="<?= $feminine->lien_calendrier ?>" target="_blank" class="btn-link">Calendrier</a>
                            <a href="<?= $feminine->lien_classement ?>" target="_blank" class="btn-link">Classement</a>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <?php endif; ?>

        <section class="team-category">
            <h2 class="category-banner">Toutes les équipes</h2>
            
            <div class="teams-grid">
                <?php foreach ($equipes as $id => $equipe): ?>
                    <?php if($id != 1): ?> 
                    <article class="team-card">
                        <h3><?= $equipe->nom ?></h3>
                        <div class="team-links">
                            <a href="<?= $equipe->lien_calendrier ?>" target="_blank" class="btn-link">Calendrier</a>
                            <a href="<?= $equipe->lien_classement ?>" target="_blank" class="btn-link">Classement</a>
                        </div>
                    </article>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php include './php/components/footer.php'; ?>
</body>
</html>