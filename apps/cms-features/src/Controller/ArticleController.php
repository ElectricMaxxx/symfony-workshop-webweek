<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 */
class ArticleController extends Controller
{
    public function index($articleName): Response
    {
        return $this->render('article/index.html.twig', ['articleName' => $articleName]);
    }
}
