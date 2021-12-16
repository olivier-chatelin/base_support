<?php

namespace App\DataFixtures;

use App\Entity\Instructor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InstructorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $jonathan = new Instructor();
        $jonathan->setFirstname('Jonathan');
        $jonathan->setLastname('Siaut');
        $jonathan->setCampus($this->getReference('bordeaux'));
        $jonathan->setCurriculum($this->getReference('data'));
        $manager->persist($jonathan);
        $this->addReference('jonathan',$jonathan);

        $guillaume = new Instructor();
        $guillaume->setFirstname('Guillaume');
        $guillaume->setLastname('Hariri');
        $guillaume->setCampus($this->getReference('bordeaux'));
        $guillaume->setCurriculum($this->getReference('PHP'));
        $manager->persist($guillaume);
        $this->addReference('guillaume',$guillaume);


        $vincent = new Instructor();
        $vincent->setFirstname('Vincent');
        $vincent->setLastname('Vaur');
        $vincent->setCampus($this->getReference('bordeaux'));
        $vincent->setCurriculum($this->getReference('PHP'));
        $manager->persist($vincent);
        $this->addReference('vincent',$vincent);

        $stephane = new Instructor();
        $stephane->setFirstname('Stéphane');
        $stephane->setLastname('Dupont');
        $stephane->setCampus($this->getReference('nantes'));
        $stephane->setCurriculum($this->getReference('PHP'));
        $manager->persist($stephane);
        $this->addReference('stephane',$stephane);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CurriculumFixtures::class,
            CampusFixtures::class,
        ];
    }
}
