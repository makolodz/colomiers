<?php 
// $database = Database::getInstance()->getConnection(); <= pour intéragir avec la base de données !!!!
// $query = $database->query("SELECT * FROM table");
// $a = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($a);

class Partenaire {

    public $id;
    public $logo;
    public $lien;
    public $nom;

    public function __construct($logo, $lien, $nom) {
        $this->logo = $logo;
        $this->lien = $lien;
        $this->nom = $nom;
    }

    public function delete() {
        if ($this->id === null) {
        return;
    }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM partenaire WHERE id_partenaire = :id"); 
        $stmt->execute(['id' => $this->id]);

        $this->id = null;
    }

}

?>