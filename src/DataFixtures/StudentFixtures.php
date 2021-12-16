<?php

namespace App\DataFixtures;

use App\Entity\Instructor;
use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StudentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $student = new Student();
        $student->setFirstname('Claire');
        $student->setLastname('Minier');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('PHP'));
        $student->setInstructor($this->getReference('guillaume'));
        $manager->persist($student);
        
        $student = new Student();
        $student->setFirstname('Anthony');
        $student->setLastname('Laurent');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('PHP'));
        $student->setInstructor($this->getReference('guillaume'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Thomas');
        $student->setLastname('Carteron');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('PHP'));
        $student->setInstructor($this->getReference('guillaume'));
        $manager->persist($student);

        $manager->flush();

        $student = new Student();
        $student->setFirstname('Pauline');
        $student->setLastname('Royo');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('JS'));
        $student->setInstructor($this->getReference('vincent'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Ozkan');
        $student->setLastname('Soyturk');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('JS'));
        $student->setInstructor($this->getReference('vincent'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Kevin');
        $student->setLastname('Devilliers');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('JS'));
        $student->setInstructor($this->getReference('vincent'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Alain');
        $student->setLastname('Habas');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('data'));
        $student->setInstructor($this->getReference('jonathan'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Adil');
        $student->setLastname('Allouche');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('data'));
        $student->setInstructor($this->getReference('jonathan'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Antoine');
        $student->setLastname('Labeyrie');
        $student->setCampus($this->getReference('bordeaux'));
        $student->setCurriculum($this->getReference('data'));
        $student->setInstructor($this->getReference('jonathan'));
        $manager->persist($student);



        $student = new Student();
        $student->setFirstname('Benoit');
        $student->setLastname('Malet');
        $student->setCampus($this->getReference('nantes'));
        $student->setCurriculum($this->getReference('PHP'));
        $student->setInstructor($this->getReference('stephane'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Frédéric');
        $student->setLastname('Colin');
        $student->setCampus($this->getReference('nantes'));
        $student->setCurriculum($this->getReference('PHP'));
        $student->setInstructor($this->getReference('stephane'));
        $manager->persist($student);

        $student = new Student();
        $student->setFirstname('Selim');
        $student->setLastname('Kazi');
        $student->setCampus($this->getReference('nantes'));
        $student->setCurriculum($this->getReference('PHP'));
        $student->setInstructor($this->getReference('stephane'));
        $manager->persist($student);


        $manager->flush();
    }
    public function getDependencies()
    {
        return[
          CampusFixtures::class,
          CurriculumFixtures::class,
          InstructorFixtures::class
        ];
    }
}
