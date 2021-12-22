<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerwisController extends AbstractController
{
    /**
     * @Route("/serwis", name="serwis")
     */
    public function index(): Response
    {
        return $this->render('serwis/index.html.twig', [
            'controller_name' => 'SerwisController',
        ]);
    }
}
