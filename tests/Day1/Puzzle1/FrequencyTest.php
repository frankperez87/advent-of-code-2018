<?php

use Acme\Day1\Puzzle1\Frequency;
use PHPUnit\Framework\TestCase;

class FrequencyTest extends TestCase
{
    /** @test */
    public function can_calculate_frequency_based_on_given_frequency_changes()
    {
        $frequency = new Frequency();

        $result1 = $frequency->calculate(['+1']);

        $result2 = $frequency->calculate(['+1', '-3']);

        $result3 = $frequency->calculate(['-1', '+3']);

        $result4 = $frequency->calculate([]);

        $this->assertEquals(1, $result1);
        $this->assertEquals(-2, $result2);
        $this->assertEquals(2, $result3);
        $this->assertEquals(0, $result4);
    }

    /** @test */
    public function can_solve_puzzle_based_on_frequency_changes_from_sample_input()
    {
        $changes = file(__DIR__ . '/input.txt');

        $frequency = new Frequency();

        $result = $frequency->calculate($changes);

        $this->assertEquals($result, 592);
    }
}
