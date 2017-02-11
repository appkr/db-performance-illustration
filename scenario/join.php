<?php

$found = null;

foreach ($users as $user) {
    if (strpos($user->name, '_9999') !== false) {
        $found = $user;
    }
}

if ($found) {
    $team = $teams[$found->team_id - 1];
    $found->team_name = $team->name;
    $found->team_since = $team->since;
    $found->team_subscription = $team->subscription;

    return $found;
}

return new \App\User;
