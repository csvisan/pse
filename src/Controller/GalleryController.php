<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ImageRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gallery')]
class GalleryController extends AbstractController
{
    #[Route('/', name: 'app_gallery_index', methods: ['GET'])]
    public function index(ImageRepository $imageRepository): Response
    {
        $images = $imageRepository->findAll();

        foreach ($images as $key => $image) {
            $images[$key]->setSource(base64_encode(stream_get_contents($image->getSource())));
        }
        return $this->render('gallery/index.html.twig', [
            'images' => $images,
        ]);
    }

    #[Route('/new', name: 'app_gallery_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImageRepository $imageRepository): Response
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $strm = fopen($form->get('source')->getData()->getRealPath(), 'rb');
            $image->setSource(stream_get_contents($strm));
            $imageRepository->add($image);
            return $this->redirectToRoute('app_gallery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gallery/new.html.twig', [
            'image' => $image,
            'form' => $form,
        ]);
    }

     #[Route('/edit/{id}', name: 'app_gallery_edit', methods: ['GET', 'POST'])]
  public function edit(Request $request, ImageRepository $imageRepository, ManagerRegistry $doctrine, int $id): Response
  {
    $image = $imageRepository->find($id);
    $form = $this->createFormBuilder()
      ->add('title', TextType::class, array('label' => 'Titlu imagine', 'required' => false))
      ->getForm();
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $manager = $doctrine->getManager();
      $image = $imageRepository->find($id);
      $newTitle = $form->get('title')->getData();
      $image->setTitle($newTitle);
      $manager->persist($image);
      $manager->flush();
      return $this->redirectToRoute('app_gallery_index', [], Response::HTTP_SEE_OTHER);
    }

    $form->get('title')->setData($image->getTitle());
    $image->setSource(base64_encode(stream_get_contents($image->getSource())));

    return $this->renderForm('gallery/edit.html.twig', [
      'image' => $image,
      'form' => $form,
    ]);
  }


    #[Route('/{id}', name: 'app_gallery_delete', methods: ['POST'])]
    public function delete(Request $request, Image $image, ImageRepository $imageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $image->getId(), $request->request->get('_token'))) {
            $imageRepository->remove($image);
        }

        return $this->redirectToRoute('app_gallery_index', [], Response::HTTP_SEE_OTHER);
    }
}
