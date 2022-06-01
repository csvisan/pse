<?php

namespace App\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MirceaRaulController extends AbstractController
{
    #[Route('/MirceaRaul')]
    public function PersonalPage(): Response
    {

        return $this->render('MirceaRaul/index.html.twig', [
            'owner' => 'Mircea Raul',
            'job' => 'soldier',
            'age' => $this->getAge(),
            'copyrightInterval' => $this->getCopyrightInterval(),
        ]);

    }
    private function getAge(): int
        {
            $now = new DateTime("now");
            $dob = new DateTime("1998-03-18 00:00:00");
            return $dob->diff($now)->y;
        }
    private function getCopyrightInterval(): string
        {
            $start = 2022;
            $end = date('Y');
            return ($end > $start) ? "$start - $end" : $start;
        }
}