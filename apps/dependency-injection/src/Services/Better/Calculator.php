<?php

namespace App\Services\Better;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class Calculator implements CalculatorInterface
{
    /**
     * @var SimpleCalculator
     */
    private $simpleCalculator;

    public function __construct(SimpleCalculator $simpleCalculator)
    {
        $this->simpleCalculator = $simpleCalculator;
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
