<?php

$search = 9999;
$start_index = 0;
$end_index = count($data) - 1;

while ($end_index > $start_index) {
    $median_index = ($start_index + $end_index);

    if ($search > $data[$median_index]->id) {
        $start_index = $median_index + 1;
    } elseif ($search < $data[$median_index]->id) {
        $end_index = $median_index - 1;
    } else {
        return $data[$median_index];
    }
}

return (object)[];