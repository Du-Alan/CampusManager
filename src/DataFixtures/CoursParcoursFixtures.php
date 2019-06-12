<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\CoursParcours;
use App\Entity\ParcoursFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CoursParcoursFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $i = 1;
        for ($k = 1; $k <= 20; $k++)
        {
            $coursParcours = new CoursParcours();

            $coursParcours->setCours($this->getReference('cours'.$k))
                ->setParcoursFormation($this->getReference('parcours'.$i))
                ->setOrdre($faker->numberBetween($min = 1, $max = 20));
            $manager->persist($coursParcours);
            if ($k % 2 == 0 )
            {
                $i++;
            }
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            CoursFixtures::class,
            ParcoursFormationFixtures::class,
        );
    }
}
