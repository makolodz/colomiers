<?php
include_once __DIR__ . '/../../configuration/apikeys.php';
$ville = 'colomiers';
$apiurl = "https://api.openweathermap.org/data/2.5/forecast?q=$ville&units=metric&lang=fr&appid=$apikey";

$data = json_decode(file_get_contents($apiurl), true);

$aujourdhui = date('Y-m-d');


$previsions = [];
foreach ($data['list'] as $item) {
    if (strpos($item['dt_txt'], $aujourdhui . ' 12:00:00') !== false) {
        $jour = [
            'date' => $item['dt_txt'],
            'temp' => round($item['main']['temp']),
            'desc' => $item['weather'][0]['description'],
            'icon' => $item['weather'][0]['icon']
        ];
        break; // on s'arrête dès qu'on trouve midi aujourd'hui
    }
}


?>