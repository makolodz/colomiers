<?php 

include_once __DIR__ . '/personnel.php';

class Joueur extends Personnel {
    public $poste;
    public $photo;
    public function __construct($nom, $prenom, $poste, $photo) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->role = "joueur";
        $this->poste = $poste;
        $this->photo = $photo;
    }
}

?>