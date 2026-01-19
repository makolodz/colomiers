<?php 

class Classement { // Match est pas un nom valide
    public $id;
    public $nom;
    public $position;
    public $points;

    public function save() {

        $db = Database::getInstance()->getConnection();
        if ($this->id === null) {
            // CREATE
            $sql = "INSERT INTO classement (nom, position, points)
                    VALUES (:nom, :position, :points)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'nom' => $this->nom,
                'position' => $this->position,
                'points' => $this->points,
            ]);

            $this->id = (int)$db->lastInsertId();
        } else {
            // UPDATE
            $sql = "UPDATE classement
                    SET nom = :nom,
                        position = :position,
                        points = :points
                    WHERE id_classement = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'id' => $this->id,
                'nom' => $this->nom,
                'position' => $this->position,
                'points' => $this->points,
            ]);
        }
    }

}

?>