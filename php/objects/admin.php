<?php 

include "./editor.php";

class Admin extends Editor {

    public function delete() {
        if ($this->id === null) {
            return;
    }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM admin WHERE id_admin = :id"); /
        $stmt->execute(['id' => $this->id]);

        $this->id = null;
    }

    public function save() {
        $db = Database::getInstance()->getConnection();

        if ($this->id === null) {
            // CREATE
            $sql = "INSERT INTO admin (nom, prenom, email, password, permission)
                    VALUES (:nom, :prenom, :email, :password, :permission)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'password' => password_hash($this->pwd, PASSWORD_DEFAULT),
                'permission' => $this->permission
            ]);
            $this->id = (int)$db->lastInsertId();
        } else {
            // UPDATE
            $sql = "UPDATE admin 
                    SET nom = :nom, 
                        prenom = :prenom, 
                        email = :email, 
                        password = :password, 
                        permission = :permission
                    WHERE id_admin = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'id' => $this->id,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'password' => password_hash($this->pwd, PASSWORD_DEFAULT),
                'permission' => $this->permission
            ]);
    }
}


   


}

?>