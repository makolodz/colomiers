<?php

// $database = Database::getInstance()->getConnection(); <= pour intéragir avec la base de données !!!!
// $query = $database->query("SELECT * FROM table");
// $a = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($a);

include __DIR__."/../configuration/config.php";

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

    public function loadBackoffice() {
        //quand on ouvre le backoffice on génère tous les objets correspondants aux datas de la bdd
        //pour accéder aux données de la bdd dans le front on utilise pas la poo mais seulement la bdd (+ si possible en AJAX) 
    }
}


?>