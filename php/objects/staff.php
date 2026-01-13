<?php 

include_once __DIR__ . '/personnel.php';

class Staff extends Personnel {
    public $email;

    public function __construct($nom, $prenom, $role, $email) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->role = $role;
        $this->email = $email;
    }
}

?>