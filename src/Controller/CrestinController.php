<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrestinController extends AbstractController
{

    #[Route('/CrestinAlexandru')]
    public function show(): Response
    {
        return $this->render('CrestinAlexandru/crs.html.twig', [
            'name' => 'Crestin Alexandru',
            'techs' => [
                ['name' => 'Java'],
                ['name' => 'Scala'],
                ['name' => 'Python'],
                ['name' => 'Spark'],
                ['name' => 'Angular'],

            ],
            'books' => [
                ['name' => 'Tată bogat, tată sărac', 'by' => 'Robert Kiyosaki'],
                ['name' => 'Elon Musk - Tesla, SpaceX si misiunea construirii unui viitor fantastic - Ashlee Vance' , 'by' => 'ASHLEE VANCE'],
            ]
        ]);
    }
}
