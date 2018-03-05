<?php

namespace App\Services;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class SumCalculator
{
    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    public function execute($a, $b)
    {
        return $a + $b;
    }
}
