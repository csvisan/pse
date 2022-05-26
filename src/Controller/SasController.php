<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SasController extends AbstractController
{

    #[Route('/SasAnamaria')]
    public function show(): Response
    {
        return $this->render('SasAnamaria/sas.html.twig', [
            'name' => 'Sas Anamaria',
            'email' => 'anamaria.sas.pabd20@uab.ro',
            'hobbies' => [
                ['name' => 'Jocuri de societate'],
                ['name' => 'Make-up'],
                ['name' => 'Citit'],
                ['name' => 'Sport'],
                ['name' => 'Muzica'],
                ['name' => 'Calatorii'],
                ['name' => 'Gatit'],
                ['name' => 'Dansuri'],
                ['name' => 'Curatenie'],
                ['name' => 'Schi'],

            ],
            'books' => [
                ['name' => 'ULYSSES', 'by' => 'James Joyce'],
                ['name' => 'THE GREAT GATSBY', 'by' => 'F. Scott Fitzgerald'],
                ['name' => 'A YOUNG MAN', 'by' => 'James Joyce'],
                ['name' => 'LOLITA', 'by' => 'Vladimir Nabokov'],
                ['name' => 'BRAVE NEW WORLD', 'by' => 'Aldous Huxley'],
                ['name' => 'THE WAY OF ALL FLESH', 'by' => 'Samuel Butler'],
                ['name' => 'NATIVE SON', 'by' => 'Richard Wright'],
                ['name' => 'U.S.A.(trilogy)', 'by' => ' John Dos Passos'],
                ['name' => 'ANIMAL FARM', 'by' => 'George Orwell'],
                ['name' => 'NOSTROMO', 'by' => 'Joseph Conrad'],
            ]
        ]);
    }
}
