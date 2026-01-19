<?php 

class Classement { // Match est pas un nom valide
    public $id;
    public $nom;
    public $position;
    public $points;

    public function __construct( $nom, $position, $points) {
        $this->nom = $nom;
        $this->position = $position;
        $this->points = $points;
    }

    public function save() {

        $db = Database::getInstance()->getConnection();
        if ($this->id === null) {
            // CREATE
            $sql = "INSERT INTO classement (id_classement, nom_team, position, points)
                    VALUES (:id_classement, :nom, :position, :points)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'id_classement' => (int)$db->lastInsertId(),
                'nom' => $this->nom,
                'position' => $this->position,
                'points' => $this->points,
            ]);
        } else {
            // UPDATE
            $sql = "UPDATE classement
                    SET nom_team = :nom,
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