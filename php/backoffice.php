<?php include __DIR__ . "/database.php" ?>

<?php 

// ici tous les formulaires (modèle pour article)

if (isset($_POST["action"])) {

    switch($_POST["action"]) {

        case "create-article": {
            $articleGen = new Article(null, date("d-m-Y"), $_POST['article-name'], null, null, null);
            $articleGen->save();

            header('Location: ../admin.php');
            exit;  
        }

        case "delete-article": {
            $article = Database::getInstance()->loadArticle($_POST["id"]);

            $article->delete();

            header('Location: ../admin.php');
            exit;
        }
        case "edit-article": {
            $article = Database::getInstance()->loadArticle($_POST["id"]);

            $article->categorie = $_POST["taxonomie"];
            $article->titre = $_POST["titre"];
            $article->texte = $_POST["texte"];
            $article->image = $_POST["image"];

            $article->save();

            header('Location: ../admin.php');
            exit;
        }
    }
}

?>