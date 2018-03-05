<?php

namespace App\Tests\Unit\Service;

use App\Models\Task;
use App\Services\Calculator;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new Calculator(new \App\Services\SumCalculator(), new \App\Services\SubtractCalculator(), 2, 4);
    }

    /**
     * @param $a
     * @param $b
     * @param $type
     *
     * @dataProvider getInvalidData
     *
     * @expectedException \App\OutOfRangeException
     */
    public function testInvalidValues($a, $b, $type)
    {
        $task = new Task();
        $task->a = $a;
        $task->b = $b;
        $task->type = $type;

        $this->sut->execute($task);
    }

    /**
     * @param $a
     * @param $b
     * @param $type
     * @param $expectedResult
     *
     * @dataProvider  getValidData
     */
    public function testValidValues($a, $b, $type, $expectedResult)
    {
        $task = new Task();
        $task->a = $a;
        $task->b = $b;
        $task->type = $type;

        $actualRestul = $this->sut->execute($task);

        $this->assertEquals($expectedResult, $actualRestul);
    }

    public function getValidData()
    {
        return [
            [2, 2, 'add', 4],
            [4, 2, 'sub', 2],
        ];
    }

    public function getInvalidData()
    {
        return [
            [0, 2, 'add'],
            [4, 5, 'add'],
            [2, 4, 'add'],
            [0, 2, 'sub'],
            [4, 5, 'sub'],
            [2, 4, 'sub'],
        ];
    }
}
