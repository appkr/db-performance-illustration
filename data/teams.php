<?php

use App\Team;

return [
    new Team([
        'id' => 1,
        'name' => '청팀',
        'since' => 1970,
        'subscription' => 'monthly'
    ]),
    new Team([
        'id' => 2,
        'name' => '홍팀',
        'since' => 1980,
        'subscription' => 'yearly'
    ]),
    new Team([
        'id' => 3,
        'name' => '백팀',
        'since' => 1990,
        'subscription' => 'monthly'
    ]),
    new Team([
        'id' => 4,
        'name' => '흑팀',
        'since' => 2000,
        'subscription' => 'forever'
    ]),
];