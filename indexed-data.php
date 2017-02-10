<?php

$index = [];

foreach ($data as $item) {
    $index[$item->team][] = $item;
}

return $index;
