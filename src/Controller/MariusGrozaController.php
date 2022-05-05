<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MariusGrozaController extends AbstractController
{
    #[Route('/marius_groza', name: 'app_marius_groza')]
    public function index(): Response
    {
        return $this->render('marius_groza/index.html.twig', [
            'controller_name' => 'MariusGrozaController',
        ]);
    }
}
