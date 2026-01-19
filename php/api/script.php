<?php

include_once __DIR__ . "/../database.php";

// Lire les données JSON envoyées par fetch
$input = json_decode(file_get_contents('php://input'), true);

$action = $input['action'] ?? null;

// Vérifier que les données sont passées en POST

if(isset($_GET["action"])) {
    
    switch($_GET["action"]) {

        case "get-link": {

            $staffByEquipe = Database::getInstance()->loadStaffsByEquipe($_GET["id_equipe"]);
            $allstaff = Database::getInstance()->loadStaffs();

            foreach ($allstaff as $staff) {
                # code...
                $staff->state = false;
                foreach($staffByEquipe as $testvar) {
                    if ($testvar == $staff) {$staff->state = true;}
                }

            }
            // Crée un tableau final
            $donnee = [
                "staffs" => $allstaff,
                "idteam" => $_GET["id_equipe"]
            ];
            echo json_encode($donnee);
            break;
        };

        case "get-articles": {
            $response = Database::getInstance()->loadArticles();
            echo json_encode($response);
            break;
        }

        case "get-teams": {
            $response = Database::getInstance()->loadEquipes();
            echo json_encode($response);
            break;
        }
    }
}


if (isset($action)) {

    switch ($input["action"]) {

        case "create-link": {
            $idStaff = $input['id_staff'] ?? null;
            $idEquipe = $input['id_equipe'] ?? null;
            $link = new StaffEquipe($idEquipe, $idStaff);
            $link->save();
            echo json_encode(["success" => true]);
            break;
        }

        case "delete-link": {
            $idStaff = $input['id_staff'] ?? null;
            $idEquipe = $input['id_equipe'] ?? null;
            $link = new StaffEquipe($idEquipe, $idStaff);
            $link->delete();
            echo json_encode(["success" => true]);
            break;
        }

        case "create-team": {
            $nom = $input['nom'] ?? null;
            $team = new Equipe(null, $nom, null, null);
            $team->save();
            echo json_encode(["success" => true]);
            break;
        }
        
        case "delete-team": {
            $id = $input['id_equipe'] ?? null;
            $team = Database::getInstance()->loadEquipe($id);
            $team->delete();
            echo json_encode(["success" => true]);
            break;

            //théoriquement faudrait supprimer les liens dans la table staff_equipe mais pas le temps :-(
        }

        case "edit-team": {
            $id = $input['id_equipe'] ?? null;
            $lien_classement = $input['lien_classement'] ?? null;
            $lien_calendrier = $input['lien_calendrier'] ?? null;
            $nom = $input['nom'] ?? null;
            $team = Database::getInstance()->loadEquipe($id);
            $team->nom = $nom;
            $team->lien_classement = $lien_classement;
            $team->lien_calendrier = $lien_calendrier;
            $team->save();
            echo json_encode(["success" => true]);
            break;
        }
    }

        /* case "create-link": {

        }
        case "create-link": {

        } */ // on peut rajouter d'autres cases ici (ceux dans backoffice.php)

}

?>