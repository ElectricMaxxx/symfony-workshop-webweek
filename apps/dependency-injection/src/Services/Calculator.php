<?php

namespace App\Services;

use App\Models\Task;
use App\OutOfRangeException;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class Calculator implements CalculatorInterface
{
    /**
     * @var SumCalculator
     */
    private $sumCalculator;
    /**
     * @var SubtractCalculator
     */
    private $subtractCalculator;
    private $minValue;
    private $maxValue;

    public function __construct(SumCalculator $sumCalculator, SubtractCalculator $subtractCalculator, $minvalue, $maxvalue)
    {
        $this->sumCalculator = $sumCalculator;
        $this->subtractCalculator = $subtractCalculator;
        $this->minValue = $minvalue;
        $this->maxValue = $maxvalue;
    }

    /**
     * @param Task $task
     *
     * @return int
     */
    public function execute(Task $task)
    {
        $this->checkRange($task->a);
        $this->checkRange($task->b);

        if ($task->type === Task::TASK_TYPE_ADD) {
            $result = $this->sumCalculator->execute($task->a, $task->b);
            $this->checkRange($result);

            return $result;
        } else {
            $result = $this->subtractCalculator->execute($task->a, $task->b);
            $this->checkRange($result);

            return $result;
        }
    }

    /**
     * @param int $value
     *
     * @throws OutOfRangeException
     */
    private function checkRange($value): void
    {
        if ($value < $this->minValue || $value > $this->maxValue) {
            throw new OutOfRangeException(sprintf("Task value '%s' should be between '%s' and '%s'", $value, $this->minValue, $this->maxValue));
        }
    }
}

