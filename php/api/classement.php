<?php



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

        return;
    }
}

return;

?>