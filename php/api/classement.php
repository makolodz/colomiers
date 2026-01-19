<?php

include_once __DIR__ . "/../../configuration/apikeys.php";
include_once __DIR__ . "/../database.php";

$chemin = './lastCheck.json';

$lastCheck = file_get_contents($chemin);
$donnee = json_decode($lastCheck, true);

$today = date('Y-m-d'); // format ISO standard

if ($donnee['lastCheck'] !== $today) {

    Database::getInstance()->getConnection()->exec("TRUNCATE TABLE classement");

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://v3.football.api-sports.io/standings?league=462&season=2023',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'x-apisports-key: ' . $apifoot,
        ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    $responseData = json_decode($response, true);
    
    $classementsArray = $responseData['response'][0]['league']['standings'][0];

    $teams = []; // tableau pour stocker les objets

    foreach ($classementsArray as $teamData) {
        $teamObj = new Classement (
            $teamData['team']['name'],
            $teamData['rank'],
            $teamData['points']
        );
        $teamObj->save();
    };
    $donnee['lastCheck'] = $today;
    file_put_contents($chemin, json_encode($donnee, JSON_PRETTY_PRINT));
}

$giveUser = Database::getInstance()->loadClassements();

echo json_encode($giveUser);

?>