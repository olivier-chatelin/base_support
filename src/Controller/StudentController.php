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
     * @Route("/new", name="new")
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
            $this->addFlash('success', 'L\'élève a bien été ajouté');
            return $this->redirectToRoute('home');
        }

        return $this->renderForm('student/index.html.twig', [
            'form' => $form
        ]);
    }
    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(ManagerRegistry $managerRegistry, Request $request, Student $student): Response
    {
        $entityManager = $managerRegistry->getManager();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success',$student->getFullName() . ' a bien été modifié');
            return $this->redirectToRoute('home');
        }
        return $this->renderForm('student/update.html.twig', [
            'form' => $form
        ]);
    }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(ManagerRegistry $managerRegistry, Request $request, Student $student): Response
    {
        $manager = $managerRegistry->getManager();
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $manager->remove($student);
            $manager->flush();
        }
        return $this->redirectToRoute('home');

    }
}
