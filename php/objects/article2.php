<?php 

    // include "./php/database.php";
    // $article = Database::getInstance()->loadArticles();
    // echo $article[1]->titre pour afficher le premier de la liste;

include_once __DIR__ . '/publication.php';
include_once __DIR__ . '/../database2.php';

class Article extends Publication {
    public $date;
    public $categorie;

    public function delete() {
        if ($this->id === null) {
            return;
        }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM article WHERE id_article = :id");
        $stmt->execute(['id' => $this->id]);

        $this->id = null;
    }

    public function save() {

        // save() est une méthode qui permet d'insérer une instance dans la bdd si elle n'y est pas déjà ou de l'update
        // l'objet doit être déjà construit et s'utiliser de cette manière : $article->save() ($article étant une instance d'article)

        $db = Database::getInstance()->getConnection();
        if ($this->id === null) {
            // CREATE
            $sql = "INSERT INTO article (titre, contenu, image, date_publication, categorie) VALUES (:titre, :contenu, :image, :date_publication, :categorie)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'titre' => $this->titre,
                'contenu' => $this->texte,
                'image' => $this->image,
                'date_publication' => $this->date,
                'categorie' => $this->categorie,
            ]);
            $this->id = (int)$db->lastInsertId();
        } else {
            // UPDATE
            $sql = "UPDATE article SET titre = :titre, contenu = :contenu, image = :image, date_publication = :date_publication, categorie = :categorie WHERE id_article = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'id' => $this->id,
                'titre' => $this->titre,
                'contenu' => $this->texte,
                'image' => $this->image,
                'date_publication' => $this->date,
                'categorie' => $this->categorie,
            ]);
        }
    }
}

?>