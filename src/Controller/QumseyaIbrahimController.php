<?php
// src/Controller/QumseyaIbrahimController.php
namespace App\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QumseyaIbrahimController extends AbstractController
{
    #[Route('/qumseyaIbrahim')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('qumseyaIbrahim/index.html.twig', [
            'owner' => 'Qumseya Ibrahim',
            'job' => 'we developer',
            'age' => $this->getAge(),
            'copyrightInterval' => $this->getCopyrightInterval(),
        ]);

    }
    private function getAge(): int
        {
            $now = new DateTime("now");
            $dob = new DateTime("1997-02-12 00:00:00");
            return $dob->diff($now)->y;
        }
    private function getCopyrightInterval(): string
        {
            $start = 2022;
            $end = date('Y');
            return ($end > $start) ? "$start - $end" : $start;
        }
}