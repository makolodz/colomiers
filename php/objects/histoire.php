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

    public function save() {
        $db = Database::getInstance()->getConnection();

        if ($this->id === null) {
            // CREATE
            $sql = "INSERT INTO histoire (titre, tranche_date, image)
                VALUES (:titre, :tranche_date, :image)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
            'titre' => $this->titre,
            'tranche_date' => $this->tranche_de_date,
            'image' => $this->image
        ]);
            $this->id = (int)$db->lastInsertId();
        } else {
            // UPDATE
            $sql = "UPDATE histoire 
                SET titre = :titre, 
                    tranche_date = :tranche_date, 
                    image = :image
                WHERE id_histoire = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
            'id' => $this->id,
            'titre' => $this->titre,
            'tranche_date' => $this->tranche_de_date,
            'image' => $this->image
        ]);
    }
}




}

?>
