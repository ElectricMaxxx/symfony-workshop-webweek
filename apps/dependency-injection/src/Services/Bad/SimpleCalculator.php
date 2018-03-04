<?php

namespace App\Services\Bad;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class SimpleCalculator
{
    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    public function sum($a, $b)
    {
        return $a + $b;
    }
}
