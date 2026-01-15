<?php include __DIR__ . "/php/database.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/club.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<?php include "./php/components/header.php"; ?>
<body>
 <main>
    <h1>Le Club</h1>

    <section id="dirigeants">
        <h2>Dirigeants</h2>
        <div class="dirigeants-grid">
            <article class="dirigeant">
                <img src="" alt="">
                <h3>Nom Prénom</h3>
                <p>poste</p>
            </article>

            <article class="dirigeant">
                <img src="" alt="">
                <h3>Nom Prénom</h3>
                <p>poste</p>
            </article>
        </div>
    </section>

    <section id="administration">
        <h2>Administration</h2>
        <div class="administration-grid">
            <article class="admin">
                <img src="" alt="">
                <h3>Nom Prénom</h3>
                <p>Poste</p>
            </article>

            <article class="admin">
                <img src="" alt="">
                <h3>Nom Prénom</h3>
                <p>Poste</p>
            </article>
        </div>
    </section>

    <section id="Histoire">
        <h2>Histoire</h2>
        <p>
            bla bla bla
        </p>
        <div class="histoire-images">
        <img src="" alt="">
        <img src="" alt="">
        </div>
    </section>

 </main>
</body>
<?php
 include "./php/components/footer.php";
?>
</html>