<?php

// $database = Database::getInstance()->getConnection(); <= pour intéragir avec la base de données !!!!
// $query = $database->query("SELECT * FROM table");
// $a = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($a);

include __DIR__ . "/../configuration/config.php";
include __DIR__ . "/objects/article.php";
include __DIR__ . "/objects/histoire.php";
include __DIR__ . "/objects/partenaires.php";
include __DIR__ . "/objects/equipe.php";
include __DIR__ . "/objects/joueur.php";
include __DIR__ . "/objects/staff.php";

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        global $hote, $port, $nom_bd, $identifiant, $mot_de_passe, $encodage, $debug;
        // option pour la gestion de l'encodage
        $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$encodage); 

        // Gestion des erreurs avec try catch 
        try 
        { 
            $this->connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bd,$identifiant, $mot_de_passe,$options); 
            if($debug) 
            { 
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }    
        } catch (PDOException $erreur) 
        {
            echo "Serveur actuellement innaccessible, veuillez nous excuser.";
            exit(); 
        } 
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }
    
    public function loadArticles() {
        $articles = [];

        $sql = "SELECT * FROM article ORDER BY date_publication DESC";
        $query = $this->connection->query($sql);

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $articles[] = new Article(
                $row['id_article'],
                $row['date_publication'],
                $row['titre'],
                $row['contenu'],
                $row['image'],
                $row['categorie']
            );
        }
        return $articles;
    }

    public function loadArticle($id) {

        $sql = "SELECT * FROM article WHERE id_article = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Article(
            $result['id_article'],
            $result['date_publication'],
            $result['titre'],
            $result['contenu'],
            $result['image'],
            $result['categorie']
        );
    }

    public function loadHistories() {
        $histoires = [];

        $sql = "SELECT * FROM histoires ORDER BY date_tranche DESC";
        $query = $this->connection->query($sql);

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $histoires[] = new Histoire(
                $row['tranche_date'],
                $row['titre'],
                $row['contenu'],
                $row['image'],
            );
        }
        return $histoires;
    }

    public function loadPartners() {
        $partners = [];

        $sql = "SELECT * FROM partenaire ORDER BY id_partenaire DESC";
        $query = $this->connection->query($sql);

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $partners[] = new Partenaire(
                $row['photo'],
                $row['photo'],
                $row['nom_societe'],
            );
        }
        return $partners;
    }

    public function loadEquipes() {
        $equipes = [];

        $sql = "SELECT * FROM equipe ORDER BY id_equipe";
        $query = $this->connection->query($sql);

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $equipes[] = new Equipe(
                $row['nom'],
                $row['lien_calendrier'],
                $row['lien_classement']
            );
        }
        return $equipes;
    }

    public function loadJoueurs() {
        $joueurs = [];
        
        $sql = "SELECT * FROM joueur";
        $query = $this->connection->query($sql);

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $joueurs[] = new Joueur(
                $row['id_joueur'],
                $row['nom'],
                $row['prenom'],
                $row['role'],
                $row['photo'],
            );
        }
        return $joueurs;
    }
    public function loadStaffs() {
        $staffs = [];
        
        $sql = "SELECT * FROM staff";
        $query = $this->connection->query($sql);

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $staffs[] = new Staff(
                $row['nom'],
                $row['prenom'],
                $row['role'],
                $row['email']
            );
        }
        return $staffs;
    }
}


?>