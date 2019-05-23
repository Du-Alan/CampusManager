<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\CoursPlanifie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CoursPlanifieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i=1;$i<=3;$i++)
        {
          
            $coursPlanifie = new CoursPlanifie();
            $coursPlanifie->setDateDebut($faker->dateTime($min = 'now', $timezone = 'Europe/Paris'))
                ->setDuree(new \DateTime('now'))
                ->setCours($this->getReference('cours'.$i));


            $manager->persist($coursPlanifie);

        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            CoursFixtures::class
        );
    }
}
