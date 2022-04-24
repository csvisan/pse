<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AncaAdrianController extends AbstractController
{
  #[Route('/anca-adrian')]
  public function show(): Response
  {
    return $this->render('AncaAdrian/index.html.twig', [
      'author' => 'Anca Adrian',
      'description' => 'NOC IP & DevOps',
      'knowledges' => [
        ['name' => 'Networking', 'experience' => '4 years'],
        ['name' => 'Python', 'experience' => '2 year'],
        ['name' => 'Java', 'experience' => '1 year'],
        ['name' => 'MySql', 'experience' => '2 years'],
        ['name' => 'Linux', 'experience' => '2 years'],
      ]
    ]);
  }
}