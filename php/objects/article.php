<?php 

include './publication.php';
class Article extends Publication {

    private $date;
    private $categorie;

    public function __construct($date, $titre, $texte, $image, $categorie) {
        $this->categorie = $categorie;
        $this->date = $date;
        $this->titre = $titre;
        $this->texte = $texte;
        $this->image = $image;
    }

    public function delete() {
        //requête sql pour delete
    }

}


?>