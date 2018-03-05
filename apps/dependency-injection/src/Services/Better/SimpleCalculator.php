<?php

namespace App\Services\Better;

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
