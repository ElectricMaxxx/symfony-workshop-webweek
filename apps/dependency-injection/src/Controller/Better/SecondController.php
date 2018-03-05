<?php

namespace App\Controller\Better;

use App\Services\Better\CalculatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class SecondController extends Controller
{
    /**
     * @param int $a
     * @param int $b
     * @param CalculatorInterface $calculator
     *
     * @return Response
     */
    public function index($a, $b, CalculatorInterface $calculator): Response
    {
        $result = $calculator->add($a, $b);

        return $this->render(
            'bad/index.html.twig',
            ['result' => $result]
        );
    }
}
