<?php

$search = 9999;
$startIndex = 0;
$endIndex = count($users) - 1;

while ($endIndex > $startIndex) {
    $medianIndex = ($startIndex + $endIndex);

    if ($search > $users[$medianIndex]->id) {
        $startIndex = $medianIndex + 1;
    } elseif ($search < $users[$medianIndex]->id) {
        $endIndex = $medianIndex - 1;
    } else {
        return $users[$medianIndex];
    }
}

return new \App\User;