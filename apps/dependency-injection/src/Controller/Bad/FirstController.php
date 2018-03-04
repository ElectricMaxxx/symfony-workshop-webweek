<?php

namespace App\Controller\Bad;

use App\Services\Helper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class FirstController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction(): Response
    {
        $helper = new Helper();
        $result = $helper->sum(2, 2);

        return $this->render('bad/index.html.twig', ['result' => $result]);
    }
}
