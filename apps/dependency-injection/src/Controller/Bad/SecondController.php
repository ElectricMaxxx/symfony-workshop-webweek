<?php

namespace App\Controller\Bad;

use App\Services\Bad\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class SecondController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction($a, $b): Response
    {
        $helper = new Calculator();
        $result = $helper->add($a, $b);

        return $this->render('bad/index.html.twig', ['result' => $result]);
    }
}
