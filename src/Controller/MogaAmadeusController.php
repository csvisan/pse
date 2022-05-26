<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MogaAmadeusController extends AbstractController
{
  #[Route('/moga-amadeus')]
  public function show(): Response
  {
    return $this->render('MogaAmadeus/moga.html.twig', [
      'author' => 'Moga Amadeus',
      'description' => 'Web designer & Frontend developer.',
      'knowledges' => [
        ['name' => 'Adobe XD', 'experience' => '4 years'],
        ['name' => 'NuxtJs', 'experience' => '1 year'],
        ['name' => 'Laravel', 'experience' => '1 year'],
        ['name' => 'C++', 'experience' => '4 years'],
        ['name' => 'ReactJs', 'experience' => '2 years'],
        ['name' => 'MySql', 'experience' => '5 years'],
        ['name' => 'REST API / JSONs', 'experience' => '3 years'],
      ]
    ]);
  }
}
