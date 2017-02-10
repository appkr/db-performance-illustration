<?php

$faker = \Faker\Factory::create('ko_KR');
$data = [];

foreach (range(1, 10000) as $id) {
    $item = new stdClass;
    $item->id = $id;
    $item->name = "{$faker->name}_{$id}";
    $item->team = $faker->randomElement(['foo', 'bar', 'baz', 'qux']);
    $data[] = $item;
}

return $data;

