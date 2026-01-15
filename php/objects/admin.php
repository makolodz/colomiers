<?php 

include "./editor.php";

class Admin extends Editor {

    public function delete() {
        if ($this->id === null) {
            return;
    }

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM admin WHERE id_admin = :id"); // attention : id_admin
        $stmt->execute(['id' => $this->id]);

        $this->id = null;
    }


}

?>