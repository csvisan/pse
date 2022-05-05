<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CristianaRoxanaController extends AbstractController
{
    #[Route('/cristiana-roxana', name: 'app_cristiana_roxana')]
    public function index(): Response
    {
        return $this->render('cristiana_roxana/index.html.twig', [
            'controller_name' => 'CristianaRoxanaController',
        ]);
    }
}
