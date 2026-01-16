<?php
// Source locale (classement complet)
$sourceFile = __DIR__ . "/source_classement_n3.json";

// Fichier cache final
$cacheFile = __DIR__ . "/classement_colomiers.json";

if (!file_exists($sourceFile)) {
    return;
}

$data = json_decode(file_get_contents($sourceFile), true);

// Sécurité structure
if (empty($data['league']['standings'][0])) {
    return;
}

// Recherche de Colomiers
foreach ($data['league']['standings'][0] as $team) {

    if (stripos($team['team']['name'], 'colomiers') !== false) {

        $classement = [
            "team"        => $team['team']['name'],
            "rank"        => $team['rank'],
            "points"      => $team['points'],
            "played"      => $team['all']['played'],
            "wins"        => $team['all']['win'],
            "draws"       => $team['all']['draw'],
            "losses"      => $team['all']['lose'],
            "goals_for"   => $team['all']['goals']['for'],
            "goals_against"=> $team['all']['goals']['against'],
            "goal_diff"   => $team['goalsDiff'],
            "last_update" => date("Y-m-d H:i:s")
        ];

        file_put_contents(
            $cacheFile,
            json_encode($classement, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        return;
    }
}

return;
