<?php

// 이 간단한 실험에서는 foreach가 array_map보다 2배 빠릅니다.
//$joined = array_map(function ($item) use ($teams) {
//    $item->joined_team_name = $teams[$item->team_id];
//    return $item;
//}, $data);

$joined = [];

foreach ($data as $item) {
    $item->joined_team_name = $teams[$item->team_id];
    $joined[] = $item;
}

foreach ($joined as $item) {
    if (strpos($item->name, '_9999') !== false) {
        return $item;
    }
}

return (object)[];

