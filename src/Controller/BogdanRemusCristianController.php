<?php

namespace App\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BogdanRemusCristianController extends AbstractController
{
  #[Route('/bogdan-remus-cristian')]
  public function show(Request $request): Response
  {
    return $this->render('BogdanRemusCristian/index.html.twig', [
      'owner' => 'Bogdan Remus Cristian',
      'job' => 'Developer',
      'skills' => [
        ['name' => 'React', 'icon' => 'react'],
        ['name' => 'Angular', 'icon' => 'angular'],
        ['name' => 'Nuxt', 'icon' => 'nuxt'],
        ['name' => 'C#', 'icon' => 'language-csharp'],
        ['name' => 'Laravel', 'icon' => 'laravel'],
      ],
      'copyrightInterval' => $this->getCopyrightInterval(),
      'personal' => [
        'dob' => '20 Martie 1987',
        'email' => 'cevacomic@gmail.com',
        'stackoverflow' => 'https://stackoverflow.com/users/13357260/cevacomic',
        'driver_license' => 'Categoria B',
        'age' => $this->getAge(),
      ],
    ]);
  }

  private function getCopyrightInterval(): string
  {
    $start = 2022;
    $end = date('Y');
    return ($end > $start) ? "$start - $end" : $start;
  }

  private function getAge(): int
  {
    $now = new DateTime("now");
    $dob = new DateTime("1987-03-20 00:00:00");
    return $dob->diff($now)->y;
  }
}
