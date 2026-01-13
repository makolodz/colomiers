<?php 

class Equipe {
    public $lien_calendrier;
    public $lien_classement;
    public $nom;
    public $trainers; //array de l'objet Staff

    public function __construct($nom, $lien_calendrier, $lien_classement) {
        $this->nom = $nom;
        $this->lien_calendrier = $lien_calendrier;
        $this->lien_classement = $lien_classement;
        $this->trainers = [];

    }
}

?>