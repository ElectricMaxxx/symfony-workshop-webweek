<?php

namespace App\Form\Types;

use App\Models\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class TaskForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('a')
            ->add('b')
            ->add('type', ChoiceType::class, ['choices'=> [Task::TASK_TYPE_ADD => 'Addieren', Task::TASK_TYPE_SUB => 'Subtrahieren']])
        ;
    }
}
