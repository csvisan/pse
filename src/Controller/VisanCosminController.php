<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisanCosminController extends AbstractController
{
    #[Route('/VisanCosmin')]
    public function index(): Response
    {
        return $this->render('VisanCosmin/index.html.twig', [
                'controller_name' => 'VisanCosminController',
        ]);
    }

}