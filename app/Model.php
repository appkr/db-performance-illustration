<?php

namespace App;

abstract class Model
{
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function __set($property, $value)
    {
        $this->{$property} = $value;
    }
}