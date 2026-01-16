<?php include __DIR__ . "/database.php" ?>

<?php 

// ici tous les formulaires (modèle pour article)

if (isset($_POST["action"])) {

    switch($_POST["action"]) {

        case "create-sponsor": {
            $sponsorGen = new Partenaire(null, date("d-m-Y"), $_POST['article-name'], null, null, null);
            $sponsorGen->save();

            header('Location: ../admin.php');
            exit;  
        }

        case "delete-sponsor": {
            $sponsor = Database::getInstance()->loadPartner($_POST["id"]);

            $sponsor->delete();

            header('Location: ../admin.php');
            exit;
        }

        case "edit-sponsor": {
            $sponsor = Database::getInstance()->loadPartner($_POST["id"]);

            $sponsor->categorie = $_POST["taxonomie"];
            $sponsor->titre = $_POST["titre"];
            $sponsor->texte = $_POST["texte"];
            $sponsor->image = $_POST["image"];

            $sponsor->save();

            header('Location: ../admin.php');
            exit;
        }

        case "create-histoire": {
            $historyGen = new Histoire(null, null, $_POST['history-name'], null, null);
            $historyGen->save();
            header('Location: ../admin.php');
            exit;
        }
    
        case "delete-histoire": {
            $history = Database::getInstance()->loadHistoire($_POST["id"]);
            $history->delete();
            header('Location: ../admin.php');
            exit;
        }

        case "edit-histoire": {
            $history = Database::getInstance()->loadHistoire($_POST["id"]);
            $history->tranche_de_date = $_POST["tranche_de_date"];
            $history->titre = $_POST["titre"];
            $history->texte = $_POST["texte"];
            $history->image = $_POST["image"];
            $history->save();
            header('Location: ../admin.php');
            exit;
        }


        case "create-article": {
            $articleGen = new Article(null, date("Y-m-d"), $_POST['article-name'], null, null, null);
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