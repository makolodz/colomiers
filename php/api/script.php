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

        case "get-histoires": {
            $response = Database::getInstance()->loadHistories();
            echo json_encode($response);
            break;
        }

        case "get-joueurs": {
            $response = Database::getInstance()->loadJoueurs();
            echo json_encode($response);
            break;
        }

        case "get-partenaires": {
            $response = Database::getInstance()->loadPartners();
            echo json_encode($response);
            break;
        }

        case "get-staffs": {
            $response = Database::getInstance()->loadStaffs(); 
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
            $nom = $input['nom'] ?? null; // remplacer $input['nom'] par le premier input dans le formulaire de création
            $objet = new Equipe(null, $nom, null, null); //remplacer l'objet et mettre seulement l'attribut nom à la création ou titre, ou nom de joueur...
            $objet->save(); // normalement tous les objets ont cette méthode qui permet de sauvegarder l'objet (ici l'insérer dans la base)
            echo json_encode(["success" => true]); // ne pas changer cette ligne et la garder
            break; // ne pas changer cette ligne et la garder
        }
        
        case "delete-team": {
            $id = $input['id_equipe'] ?? null; // ici on prend un id pour supprimer de la db id_article, id_joueur...
            $objet = Database::getInstance()->loadEquipe($id); // ici il faut loadArticle() ou loadHistoire => les méthodes sans -s à la fin load un seul objet
            $objet->delete(); // ne pas changer cette ligne et la garder
            echo json_encode(["success" => true]); // ne pas changer cette ligne et la garder
            break; // ne pas changer cette ligne et la garder

            //théoriquement faudrait supprimer les liens dans la table staff_equipe mais pas le temps :-(
        }

        case "edit-team": {

            /* les attributs changent à chaque fois, globalement faut récupérer les champs de la bdd  */

            $id = $input['id_equipe'] ?? null;
            $lien_classement = $input['lien_classement'] ?? null;
            $lien_calendrier = $input['lien_calendrier'] ?? null;
            $nom = $input['nom'] ?? null;

            /* */

            $objet = Database::getInstance()->loadEquipe($id);  // ici il faut loadArticle() ou loadHistoire => les méthodes sans -s à la fin load un seul objet

            /* Symétrique des 4 ligne d'en haut sauf pour l'id qu'on a déjà dans l'objet et qu'on ne change jamais */

            $objet->nom = $nom; 
            $objet->lien_classement = $lien_classement;
            $objet->lien_calendrier = $lien_calendrier;

            $objet->save(); // ne pas changer cette ligne et la garder
            echo json_encode(["success" => true]); // ne pas changer cette ligne et la garder
            break; // ne pas changer cette ligne et la garder
        }
        
        // GESTION DES ARTICLES

        case "create-article": {
            $titre = $input['titre'] ?? null;
            $contenu = $input['contenu'] ?? null;
            $date = $input['date'] ?? null;
            $categorie = $input['categorie'] ?? null;
            $image = $input['image'] ?? null;

            $objet = new Article(null, $titre, $contenu, $date, $categorie, $image); 
            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        case "delete-article": {
            $id = $input['id_article'] ?? null; 
            $objet = Database::getInstance()->loadArticle($id);
            $objet->delete(); 
            echo json_encode(["success" => true]);
            break;
        }

        case "edit-article": {
            $id = $input['id_article'] ?? null;
            $titre = $input['titre'] ?? null;
            $contenu = $input['contenu'] ?? null;
            $date = $input['date'] ?? null;
            $categorie = $input['categorie'] ?? null;
            $image = $input['image'] ?? null;

            $objet = Database::getInstance()->loadArticle($id);

            // Mise à jour des attributs
            $objet->titre = $titre;
            $objet->contenu = $contenu;
            $objet->date = $date;
            $objet->categorie = $categorie;
            $objet->image = $image;

            $objet->save(); 
            echo json_encode(["success" => true]);
            break;
        }

        // GESTION DES HISTOIRES

        case "create-histoire": {
            $titre = $input['titre'] ?? null;
            $description = $input['description'] ?? null;
            $date = $input['date'] ?? null;
            $image = $input['image'] ?? null;


            $objet = new Histoire(null, $titre, $description, $date, $image);
            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        case "delete-histoire": {
            $id = $input['id_histoire'] ?? null;
            $objet = Database::getInstance()->loadHistory($id);
            $objet->delete();
            echo json_encode(["success" => true]);
            break;
        }

        case "edit-histoire": {
            $id = $input['id_histoire'] ?? null;
            $titre = $input['titre'] ?? null;
            $description = $input['description'] ?? null;
            $date = $input['date'] ?? null;
            $image = $input['image'] ?? null;

            $objet = Database::getInstance()->loadHistory($id);

            $objet->titre = $titre;
            $objet->description = $description;
            $objet->date = $date;
            $objet->image = $image;

            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        // GESTION DES JOUEURS

        case "create-joueur": {
            $nom = $input['nom'] ?? null;
            $prenom = $input['prenom'] ?? null;
            $poste = $input['poste'] ?? null;
            $numero = $input['numero'] ?? null;
            $image = $input['image'] ?? null;
            $id_equipe = $input['id_equipe'] ?? null;

            $objet = new Joueur(null, $nom, $prenom, $poste, $numero, $image, $id_equipe);
            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        case "delete-joueur": {
            $id = $input['id_joueur'] ?? null;
            $objet = Database::getInstance()->loadJoueur($id);
            $objet->delete();
            echo json_encode(["success" => true]);
            break;
        }

        case "edit-joueur": {
            $id = $input['id_joueur'] ?? null;
            $nom = $input['nom'] ?? null;
            $prenom = $input['prenom'] ?? null;
            $poste = $input['poste'] ?? null;
            $numero = $input['numero'] ?? null;
            $image = $input['image'] ?? null;
            $id_equipe = $input['id_equipe'] ?? null;

            $objet = Database::getInstance()->loadJoueur($id);

            $objet->nom = $nom;
            $objet->prenom = $prenom;
            $objet->poste = $poste;
            $objet->numero = $numero;
            $objet->image = $image;
            $objet->id_equipe = $id_equipe;

            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        // GESTION DES PARTENAIRES

        case "create-partenaire": {
            $nom = $input['nom'] ?? null;
            $logo = $input['logo'] ?? null;
            $lien = $input['lien'] ?? null;

            $objet = new Partenaire(null, $nom, $logo, $lien);
            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        case "delete-partenaire": {
            $id = $input['id_partenaire'] ?? null;
            $objet = Database::getInstance()->loadPartner($id);
            $objet->delete();
            echo json_encode(["success" => true]);
            break;
        }

        case "edit-partenaire": {
            $id = $input['id_partenaire'] ?? null;
            $nom = $input['nom'] ?? null;
            $logo = $input['logo'] ?? null;
            $lien = $input['lien'] ?? null;

            $objet = Database::getInstance()->loadPartner($id);

            $objet->nom = $nom;
            $objet->logo = $logo;
            $objet->lien = $lien;

            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        // GESTION DU STAFF

        case "create-staff": {
            $nom = $input['nom'] ?? null;
            $prenom = $input['prenom'] ?? null;
            $role = $input['role'] ?? null;
            $image = $input['image'] ?? null;

            $objet = new Staff(null, $nom, $prenom, $role, $image);
            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }

        case "delete-staff": {
            $id = $input['id_staff'] ?? null;
            $objet = Database::getInstance()->loadStaff($id);
            $objet->delete();
            echo json_encode(["success" => true]);
            break;
        }

        case "edit-staff": {
            $id = $input['id_staff'] ?? null;
            $nom = $input['nom'] ?? null;
            $prenom = $input['prenom'] ?? null;
            $role = $input['role'] ?? null;
            $image = $input['image'] ?? null;

            $objet = Database::getInstance()->loadStaff($id);

            $objet->nom = $nom;
            $objet->prenom = $prenom;
            $objet->role = $role;
            $objet->image = $image;

            $objet->save();
            echo json_encode(["success" => true]);
            break;
        }
    }

        /* ici il faut copier coller et modifier les case : "create/delete/edit-team */
        /* attention les champs et attributs objets sont pas toujours les mêmes ! */
        /* j'ai commenté les cases pour que ça soit à peu près guidé ! woooho*/
        /* il faut rajouter pour articles histoires partenaires staffs et joueurs */

}

?>