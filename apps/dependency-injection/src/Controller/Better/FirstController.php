<?php

namespace App\Controller\Better;

use App\Services\Helper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class FirstController extends Controller
{
    public function index(Helper $helper)
    {
        return $this->render(
            'better/index.html.twig',
            ['result' => $helper->sum(2, 2)]
        );
    }
}
