<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarzGeaninaController extends AbstractController
{
    #[Route('/barz-geanina', name: 'app_barz_geanina')]
    public function index(): Response
    {
        return $this->render('barz_geanina/index.html.twig', [
            'controller_name' => 'BarzGeaninaController',
        ]);
    }
}
