<?php
include_once __DIR__ . '/../configuration/config.php';
$ville = 'colomiers';
$apiurl = "https://api.openweathermap.org/data/2.5/forecast?q=$ville&units=metric&lang=fr&appid=$apikey";
$data = json_decode(file_get_contents($apiurl), true);
$previsions = [];
foreach ($data['list'] as $item) {
if (strpos($item['dt_txt'], '12:00:00') !== false) {
     $previsions[] = [
            'date' => $item['dt_txt'],
            'temp' => round($item['main']['temp']),
            'desc' => $item['weather'][0]['description'],
            'icon' => $item['weather'][0]['icon']
        ];
    }
}
?>