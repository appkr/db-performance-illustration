<?php

$faker = \Faker\Factory::create('ko_KR');
$data = [];

foreach (range(1, 10000) as $id) {
    $team = $faker->randomElement(array_values($teams));

    $item = new stdClass;
    $item->id = $id;
    $item->name = "{$faker->name}_{$id}";
    $item->team = $team;
    $item->team_id = array_search($team, $teams, true);
    $data[] = $item;
}

return $data;

