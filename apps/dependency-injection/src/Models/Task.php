<?php

namespace App\Models;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class Task
{
    const TASK_TYPE_ADD = 'add';
    const TASK_TYPE_SUB = 'sub';

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     * @Assert\GreaterThan(0)
     */
    public $a;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     * @Assert\GreaterThan(0)
     */
    public $b;

    /**
     * Should be one of 'add' and 'sub'. Defaults on 'add'
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @var string;
     */
    public $type = self::TASK_TYPE_ADD;
}
