<<<<<<< HEAD
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AncaAdrianController extends AbstractController
{
    #[Route('/anca-adrian')]
    public function index(): Response
    {
        return $this->render('AncaAdrian/index.html.twig', [
            'controller_name' => 'AncaAdrianController',
        ]);
    }
=======
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AncaAdrianController extends AbstractController
{
    #[Route('/anca-adrian')]
    public function index(): Response
    {
        return $this->render('AncaAdrian/index.html.twig', [
            'controller_name' => 'AncaAdrianController',
        ]);
    }
>>>>>>> 097b9b46d4b34eb14d0f2e86c788c8211bf18647
}