<?php

namespace App\Services\Bad;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class Calculator
{
    /**
     * @var SimpleCalculator
     */
    private $simpleCalculator;

    public function __construct()
    {
        $this->simpleCalculator = new SimpleCalculator();
    }

    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    public function add($a, $b)
    {
        return $this->simpleCalculator->sum($a, $b);
    }
}
