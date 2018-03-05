<?php

namespace App\Services;

use App\Models\Task;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
interface CalculatorInterface
{
    /**
     * @param Task $task
     *
     * @return int
     */
    public function execute(Task $task);
}
