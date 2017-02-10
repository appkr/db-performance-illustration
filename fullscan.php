<?php

foreach ($data as $item) {
    if (strpos($item->name, '_9999') !== false) {
        return $item;
    }
}

return (object)[];