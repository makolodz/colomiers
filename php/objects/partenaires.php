<?php 

include '../database.php';

// $database = Database::getInstance()->getConnection(); <= pour intéragir avec la base de données !!!!
// $query = $database->query("SELECT * FROM table");
// $a = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($a);

class Partenaires {

    private $id;
    private $logo;
    private $lien;
    private $nom;

    public function __construct(Admin $admin, $logo, $lien, $nom) {
        $this->logo = $logo;
        $this->lien = $lien;
        $this->nom = $nom;

        $database = Database::getInstance()->getConnection();
        // $query = $database->query("INSERT INTO") requête à modifier

        // $this->id = ; database request
    }

    public function load () {
        //fonction qui génère
    }

    // la méthode en dessous est censée être utilisée lors de la modification d'un partenaire dans le backoffice
    public function editPartner(Admin $admin, $logo, $lien, $nom) {
        $this->logo = $logo;
        $this->lien = $lien;
        $this->nom = $nom;

        $database = Database::getInstance()->getConnection();
        // $query = $database->query("UPDATE * FROM Partners WHERE") requête à modifier
    }
    public function deletePartner(Admin $admin) {
        $database = Database::getInstance()->getConnection();
        // $query = $database->query("DELETE FROM partners WHERE id="")
        // pas besoin de détruire l'instance ?
    }
}

?>