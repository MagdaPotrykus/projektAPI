<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LakierniaController extends AbstractController
{
    /**
     * @Route("/lakiernia", name="lakiernia")
     */
    public function index(): Response
    {
        return $this->render('lakiernia/index.html.twig', [
            'controller_name' => 'LakierniaController',
        ]);
    }
}
