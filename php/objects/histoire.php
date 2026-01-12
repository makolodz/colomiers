<?php

include './publication.php';

class Histoire extends Publication {
    private $tranche_de_date;

    public function __construct($tranche_de_date, $titre, $texte, $image) {
        $this->id = 1;//requête sql pour id;
        $this->tranche_de_date = $tranche_de_date;
        $this->titre = $titre;
        $this->texte = $texte;
        $this->image = $image;
    }
    
    public function delete() {
        //requête sql pour delete
    }

    
}

?>