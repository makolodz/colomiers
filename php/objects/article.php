<?php 

    // include "./php/database.php";
    // $article = Database::getInstance()->loadArticles();
    // echo $article[1]->titre pour afficher le premier de la liste;

include_once __DIR__ . '/publication.php';
include_once __DIR__ . '/../database.php';

class Article extends Publication {
    public $date;
    public $categorie;
    public function __construct($id, $date, $titre, $texte, $image, $categorie) {
        $this->id = $id;
        $this->categorie = $categorie;
        $this->date = $date;
        $this->titre = $titre;
        $this->texte = $texte;
        $this->image = $image;
    }

    public function delete() {
        if ($this->id === null) {
            return;
        }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM article WHERE id_article = :id");
        $stmt->execute(['id' => $this->id]);

        $this->id = null;
    }
}

/*
    public function save() {
        $db = Database::getConnection();

        if ($this->id === null) {
            // CREATE
            $sql = "INSERT INTO article () VALUES ()";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->id = (int)$db->lastInsertId();
        } else {
            // UPDATE
            $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email
            ]);
        }
    }

    DELETE

    public function delete() {
        if ($this->id === null) {
            return;
        }

        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $this->id]);

        $this->id = null;
    }
}

*/

?>