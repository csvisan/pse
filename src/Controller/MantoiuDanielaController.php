<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MantoiuDanielaController extends AbstractController
{

    #[Route('/MantoiuDaniela')]
    public function show(): Response
    { 
        return $this->render('MantoiuDaniela/mantoiu_daniela.html.twig', [
            'controller_name' => 'MantoiuDanielaController',]);
    
   }
}
