<?php

namespace Acme\Day1;

class Frequency
{
    public function calculate(array $input, $start = 0) : int
    {
        return array_reduce($input, function ($carry, $change) {
            $carry += intval($change);
            return $carry;
        }, $start);
    }

    public function findFirstDuplicate(array $input, $startingFrequencies = [0])
    {
        $frequencies = $startingFrequencies;

        foreach ($input as $change) {
            $frequency = $this->calculate([$change], $frequencies[count($frequencies) - 1]);

            if (in_array($frequency, $frequencies)) {
                return $frequency;
            }

            array_push($frequencies, $frequency);
        }

        return $this->findFirstDuplicate($input, $frequencies);
    }
}
