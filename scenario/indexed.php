<?php

foreach ($userIndex[4] as $user) {
    if (strpos($user->name, '_9999') !== false) {
        return $user;
    }
}

return new \App\User;