<?php

use App\User;

$faker = \Faker\Factory::create('ko_KR');
$users = [];

foreach (range(1, 10000) as $id) {
    $team = $faker->randomElement($teams);

    $users[] = new User([
        'id' => $id,
        'name' => "{$faker->name}_{$id}",
        'email' => $faker->safeEmail,
        'team_id' => $team->id
    ]);
}

return $users;

