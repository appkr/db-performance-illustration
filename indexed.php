<?php

foreach ($index['foo'] as $item) {
    if (strpos($item->name, '_9999') !== false) {
        return $item;
    }
}

return (object)[];