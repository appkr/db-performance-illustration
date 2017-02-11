<?php

$joined = [];

foreach ($users as $user) {
    $team = $teams[$user->team_id - 1];
    $user->team_name = $team->name;
    $user->team_since = $team->since;
    $user->team_subscription = $team->subscription;
    $joined[] = $user;
}

foreach ($joined as $user) {
    if (strpos($user->name, '_9999') !== false) {
        return $user;
    }
}

return new \App\User;

