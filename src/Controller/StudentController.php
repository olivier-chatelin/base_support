<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/student", name="student_")
     */
class StudentController extends AbstractController
{
    /**
     * @Route("/student/new", name="new")
     */
    public function new(ManagerRegistry $managerRegistry, Request $request): Response
    {
        $student = new Student();
        $entityManager = $managerRegistry->getManager();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($student);
            $entityManager->flush();
            $this->addFlash('success', 'L\'élève a bien ajouté');
            return $this->redirectToRoute('home');
        }

        return $this->renderForm('student/index.html.twig', [
            'form' => $form
        ]);
    }
}
