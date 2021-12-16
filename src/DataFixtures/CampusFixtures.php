<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CampusFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $campus = new Campus();
        $campus->setCity('Bordeaux');
        $campus->setIsRemote(false);
        $campus->addCurriculum($this->getReference('data'));
        $campus->addCurriculum($this->getReference('JS'));
        $campus->addCurriculum($this->getReference('PHP'));
        $manager->persist($campus);
        $this->addReference('bordeaux',$campus);

        $campus = new Campus();
        $campus->setCity('Nantes');
        $campus->setIsRemote(false);
        $campus->addCurriculum($this->getReference('PHP'));
        $manager->persist($campus);
        $this->addReference('nantes',$campus);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CurriculumFixtures::class
        ];
    }
}
