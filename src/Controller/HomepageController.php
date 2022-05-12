<?php

namespace App\Controller;

use App\Entity\Student;
use App\Service\FileUploader;
use App\Service\SessionManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomepageController extends AbstractController
{
  #[Route('/')]
  public function show(ManagerRegistry $doctrine, SessionManager $sessionManager): Response
  {
    $isLogged = $sessionManager->isLogged();

    $students = $doctrine->getRepository(Student::class)->findBy([], ['name' => 'ASC']);

    foreach ($students as $key => $student) {
      if (!file_exists('./' . $student->getPicture())) {
        $student->setPicture('/uploads/placeholder.png');
      }
      $students[$key] = $student;
    }

    return $this->render('homepage/index.html.twig', [
      "students" => $students,
      "isLogged" => $isLogged,
    ]);
  }

  #[Route('/admin')]
  public function new(Request $request, ManagerRegistry $doctrine, FileUploader $fileUploader, SessionManager $sessionManager)
  {
    $isLogged = $sessionManager->isLogged();
    if (!$isLogged) {
      return $this->auth($request, $sessionManager);
    }

    $manager = $doctrine->getManager();

    $student = new Student();
    $form = $this->createFormBuilder()
      ->add('id', IntegerType::class, array('label' => 'ID Student', 'required' => false, 'attr' => array('class' => 'disabled')))
      ->add('name', TextType::class, array('label' => 'Nume student'))
      ->add('link', TextType::class, array('label' => 'Link pagină', 'required' => false))
      ->add('picture', FileType::class, array('label' => 'Poza (png, jpeg)', 'required' => false, 'attr' => array('accept' => 'images/*')))
      ->add('save', SubmitType::class, array('label' => 'Salvează'))
      ->getForm();

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $id = $form->get('id')->getData();
      $student = $id > 0 ? $doctrine->getRepository(Student::class)->find($id) : new Student();
      $studentPicture = $form->get('picture')->getData();
      if ($studentPicture) {
        $picture = $fileUploader->upload($studentPicture);
        $student->setPicture("/uploads/" . $picture);
      }
      $student->setName($form->get('name')->getData());
      $student->setLink($form->get('link')->getData());
      $manager->persist($student);
      $manager->flush();
      return $this->redirect('/admin/' . '?addedStudent=true');
    }

    $students = $doctrine->getRepository(Student::class)->findBy([], ['name' => 'ASC']);

    foreach ($students as $key => $student) {
      if (!file_exists('./' . $student->getPicture())) {
        $student->setPicture('/uploads/placeholder.png');
      }
      $students[$key] = $student;
    }

    return $this->render('homepage/admin.html.twig', array(
      'form' => $form->createView(),
      'students' => $students,
      'isLogged' => $isLogged,
    ));
  }

  #[Route('/admin/logout')]
  public function logout(SessionManager $sessionManager): Response
  {
    $sessionManager->setIsAdmin(false);
    return $this->redirect('/admin/' . '?logoutSuccess=true');
  }

  #[Route('/admin/delete-student/{id}')]
  public function delete(Request $request, ManagerRegistry $doctrine, SessionManager $sessionManager, int $id): Response
  {
    $isLogged = $sessionManager->isLogged();
    if (!$isLogged) {
      return $this->auth($request, $sessionManager);
    }

    $student = $doctrine->getRepository(Student::class)->find($id);
    if (!$student) {
      throw $this->createNotFoundException('Studentul nu a fost găsit');
    }
    $manager = $doctrine->getManager();
    $manager->remove($student);
    $manager->flush();
    return $this->redirect('/admin/' . '?deletedStudent=true');
  }

  #[Route('/admin/remove-student-picture/{id}')]
  public function removePicture(Request $request, ManagerRegistry $doctrine, SessionManager $sessionManager, int $id): Response
  {
    $isLogged = $sessionManager->isLogged();
    if (!$isLogged) {
      return $this->auth($request, $sessionManager);
    }

    $student = $doctrine->getRepository(Student::class)->find($id);
    if (!$student) {
      throw $this->createNotFoundException('Studentul nu a fost găsit');
    }

    $student->setPicture("/uploads/placeholder.png");

    $manager = $doctrine->getManager();
    $manager->persist($student);
    $manager->flush();
    return $this->redirect('/admin/' . '?deletedStudent=true');
  }

  private function auth(Request $request, SessionManager $sessionManager)
  {
    $isLogged = $sessionManager->isLogged();
    $hash = '$2y$10$f4fdUa.2676pyBAzEaNbouxajvA8k/S8/E62YhivRek4CzKtHYAVO';
    $form = $this->createFormBuilder()
      ->add('password', PasswordType::class, array('label' => 'Parolă administrator'))
      ->add('login', SubmitType::class, array('label' => 'Autentificare'))
      ->getForm();

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid() && password_verify($form['password']->getData(), $hash)) {
      $sessionManager->setIsAdmin(true);
      return $this->redirect('/admin/' . '?loginSuccess=true');
    } else {
      return $this->render('homepage/login.html.twig', array(
        'form' => $form->createView(),
        'error' => $form->isSubmitted(),
        'isLogged' => $isLogged,
      ));
    }
  }
}
