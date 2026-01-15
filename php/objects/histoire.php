<?php

include_once __DIR__ . '/publication.php';

class Histoire extends Publication {
    public $tranche_de_date;

    public function __construct($id, $tranche_de_date, $titre, $texte, $image) {
        $this->id = 1;//requête sql pour id;
        $this->tranche_de_date = $tranche_de_date;
        $this->titre = $titre;
        $this->texte = $texte;
        $this->image = $image;
    }

    public function delete() {
        if ($this->id === null) {
            return;
        }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM histoires WHERE id_histoire = :id");
        $stmt->execute(['id' => $this->id]);

        $this->id = null;
    }

}

?>