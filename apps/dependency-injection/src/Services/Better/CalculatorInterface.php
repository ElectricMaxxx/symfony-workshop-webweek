<?php

namespace App\Services\Better;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
interface CalculatorInterface
{
    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    public function add($a, $b);
}
