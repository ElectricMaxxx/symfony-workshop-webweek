<?php

namespace App\Controller;

use App\Form\Types\TaskForm;
use App\Models\Task;
use App\Services\CalculatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class TaskController extends Controller
{
    public function index(RequestStack $requestStack, CalculatorInterface $calculator)
    {
        $result = null;
        $form = $this->createForm(TaskForm::class, new Task());
        $form->handleRequest($requestStack->getMasterRequest());

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $result = $calculator->execute($task);
        }

        return $this->render('task/index.html.twig', ['form' => $form->createView(), 'result' => $result]);
    }
}
