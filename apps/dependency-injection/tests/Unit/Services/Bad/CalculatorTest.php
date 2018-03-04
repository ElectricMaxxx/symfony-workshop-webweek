<?php

use App\Services\Bad\Calculator;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class CalculatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    private $sut;

    public function testAddCalculation()
    {
        $this->sut = new Calculator();
        $result = $this->sut->add(1, 2);

        $this->assertEquals(3, $result);
    }
}
