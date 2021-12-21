<?php

namespace App\Controller;

use App\Entity\Student;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $studentRepository = $managerRegistry->getRepository(Student::class);
        $students = $studentRepository->findAll();
        return $this->render('home/index.html.twig', [
            'students' => $students,
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(Student $student): Response
    {
        return $this->render('home/show.html.twig', [
            'student' => $student,
        ]);
    }
}
