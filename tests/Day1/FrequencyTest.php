<?php

use Acme\Day1\Frequency;
use PHPUnit\Framework\TestCase;

class FrequencyTest extends TestCase
{
    /** @test */
    public function can_solve_puzzle_1_based_on_frequency_changes_from_sample_input()
    {
        $changes = file(__DIR__ . '/input.txt');

        $frequency = new Frequency();

        $result = $frequency->calculate($changes);

        $this->assertEquals(592, $result);
    }

    /** @test */
    public function can_solve_puzzle_2_based_on_frequency_changes_from_sample_input()
    {
        $changes = file(__DIR__ . '/input.txt');

        $frequency = new Frequency();

        $result = $frequency->findFirstDuplicate($changes);

        $this->assertEquals(241, $result);
    }

    /** @test */
    public function can_calculate_frequency_based_on_given_frequency_changes()
    {
        $frequency = new Frequency();

        $result1 = $frequency->calculate(['+1']);

        $result2 = $frequency->calculate(['+1', '-3']);

        $result3 = $frequency->calculate(['-1', '+3']);

        $result4 = $frequency->calculate([]);

        $result5 = $frequency->calculate([], 1);

        $this->assertEquals(1, $result1);
        $this->assertEquals(-2, $result2);
        $this->assertEquals(2, $result3);
        $this->assertEquals(0, $result4);
        $this->assertEquals(1, $result5);
    }

    /** @test */
    public function can_find_first_duplicate_frequency()
    {
        $frequency = new Frequency();

        $result1 = $frequency->findFirstDuplicate(['+1', '-1']);

        $result2 = $frequency->findFirstDuplicate(['+3', '+3', '+4', '-2', '-4']);

        $result3 = $frequency->findFirstDuplicate(['-6', '+3', '+8', '+5', '-6']);

        $result4 = $frequency->findFirstDuplicate(['+7', '+7', '-2', '-7', '-4']);

        $this->assertEquals(0, $result1);
        $this->assertEquals(10, $result2);
        $this->assertEquals(5, $result3);
        $this->assertEquals(14, $result4);
    }
}
