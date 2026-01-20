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

        $equipes = Database::getInstance()->loadEquipes();
        
        $feminine = isset($equipes[1]) ? $equipes[1] : null;

        $stafffem = Database::getInstance()->loadStaffsByEquipe($feminine->id);

        ?>

        <?php if($feminine): ?>
        <section class="team-category">
            <h2 class="category-banner">Section Féminine</h2>
            
            <div class="feminine-highlight">
                <article class="team-card featured-card">
                    <div class="team-icon">⚽</div> 
                    <div class="team-info">
                        <h3><?= $feminine->nom ?></h3>
                        <div>
                            <?php foreach($stafffem as $staff):?>
                                <div>
                                    <?php echo $staff->nom ?>
                                    <?php echo $staff->prenom ?>
                                    - <?php echo $staff->email ?>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <br>
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
                    <?php $staffs = Database::getInstance()->loadStaffsByEquipe($equipe->id) ?>
                    <?php if($id != 1): ?> 
                    <article class="team-card">
                        <h3><?= $equipe->nom ?></h3>
                        <div>
                        <?php foreach($staffs as $staff):?>
                            <div>
                                <?php echo $staff->nom ?>
                                <?php echo $staff->prenom ?>
                                - <?php echo $staff->email ?>
                            </div>
                        <?php endforeach;?>
                        </div>
                        <br>
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