<?php 

include_once __DIR__ . '/personnel.php';

class Staff extends Personnel {
    public $email;

    public $state;

    public function __construct($id, $nom, $prenom, $role, $email) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->role = $role;
        $this->email = $email;
        $this->state = null; //équivalent de undefined parce que on le défini dans le script d'api
    }
    public function save() {
        $db = Database::getInstance()->getConnection();

        if ($this->id === null) {
            // CREATE
            $sql = "INSERT INTO staff (nom, prenom, role, email)
                    VALUES (:nom, :prenom, :role, :email)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'role' => $this->role,
                'email' => $this->email
            ]);

            $this->id = (int)$db->lastInsertId();
        } else {
            // UPDATE
            $sql = "UPDATE staff
                    SET nom = :nom,
                        prenom = :prenom,
                        role = :role,
                        email = :email
                    WHERE id_staff = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'id' => $this->id,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'role' => $this->role,
                'email' => $this->email
            ]);
        }
    }

    public function delete() {
        if ($this->id === null) {
            return;
        }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM staff WHERE id_staff = :id");
        $stmt->execute([
            'id' => $this->id
        ]);

        $this->id = null;
    }


}

?>
