<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyjniaController extends AbstractController
{
    /**
     * @Route("/myjnia", name="myjnia")
     */
    public function index(): Response
    {
        return $this->render('myjnia/index.html.twig', [
            'controller_name' => 'MyjniaController',
        ]);
    }
}
