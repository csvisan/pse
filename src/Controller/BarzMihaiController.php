<?php

namespace App\Controller;
use DateTime;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarzMihaiController extends AbstractController
{
    #[Route('/barz-mihai', name: 'app_barz_mihai')]
    public function index(): Response
    {
        return $this->render('barz_mihai/index.html.twig', [
            'controller_name' => 'BarzMihaiController',
                        'owner' => 'Mihai Barz',
                       'age' => $this->getAge()
        ]);
    }

    private function getAge(): int
    {
        $now = new DateTime("now");
        $dob = new DateTime("1989-08-18 00:00:00");
        return $dob->diff($now)->y;
    }
}
