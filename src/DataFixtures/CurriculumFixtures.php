<?php

namespace App\DataFixtures;

use App\Entity\Curriculum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CurriculumFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = new Curriculum();
        $data->setName('Data');
        $manager->persist($data);
        $this->addReference('data',$data);

        $js = new Curriculum();
        $js->setName('JS');
        $manager->persist($js);
        $this->addReference('JS',$js);

        $php = new Curriculum();
        $php->setName('PHP');
        $manager->persist($php);
        $this->addReference('PHP',$php);

        $manager->flush();
    }
}
