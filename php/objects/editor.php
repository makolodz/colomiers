<?php 


class Editor {

    public $id;
    private $nom;
    private $prenom;
    private $pwd;
    private $email;
    private $permission;

    public function login () {
        // fonction qui vérifie que le mot de passe et le login donnés sont les bons et return true + session
    }

    public function __construct(Admin $admin, $email, $pwd, $prenom, $nom) {
        $this->email = $email;
        $this->pwd = $pwd;
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function delete() {
        if ($this->id === null) {
            return;
        }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM admin WHERE id_admin = :id"); // attention : id_admin
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