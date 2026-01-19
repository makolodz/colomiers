<?php 

class StaffEquipe {
    public $id_equipe;
    public $id_staff;

    public function __construct($id_equipe, $id_staff) {
        $this->id_equipe = $id_equipe;
        $this->id_staff = $id_staff;
    }

    public function delete() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM staff_equipe WHERE id_staff = :id_staff AND id_equipe = :id_equipe");
        $stmt->execute(['id_staff' => $this->id_staff, 'id_equipe' => $this->id_equipe]);
        $this->id_equipe = null;
        $this->id_staff = null;
    }

    public function save() {
        $db = Database::getInstance()->getConnection();
        // CREATE (on a pas besoin d'update puisque c'est une table de relation ^^)
        $sql = "INSERT INTO staff_equipe (id_staff, id_equipe) VALUES (:id_staff, :id_equipe)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'id_staff' => $this->id_staff,
            'id_equipe' => $this->id_equipe,
        ]);
    }
}

?>