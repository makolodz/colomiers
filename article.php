<?php 

include __DIR__ . "/php/database.php";

if (isset($_GET['article'])) {
    $article = Database::getInstance()->loadArticle($_GET['article']);
} else {
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US Colomiers Football</title>
        
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">

</head>

<body>

    <?php include "php/components/header.php";?>

    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo $article->titre ?></h1>
            <p class="hero-subtitle"><?php echo $article->texte?></p>
        </div>
    </section>

    <?php include 'php/components/footer.php'; ?>


</body>