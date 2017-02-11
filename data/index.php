<?php

$userIndex = [];

foreach ($users as $user) {
    $userIndex[$user->team_id][] = $user;
}

return $userIndex;
