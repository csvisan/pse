<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DenisController extends AbstractController
{
  #[Route('/popa-denis')]
  public function show(): Response
  {
    return $this->render('PopaDenis/main.html.twig', [
      'author' => 'Denis Popa',
    ]);
  }
}