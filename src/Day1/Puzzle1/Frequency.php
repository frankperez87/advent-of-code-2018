<?php

namespace Acme\Day1\Puzzle1;

class Frequency
{
    public function calculate(array $input) : int
    {
        return array_reduce($input, function ($carry, $change) {
            $carry += intval($change);
            return $carry;
        }, 0);
    }
}
