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
        for ($k = 1; $k <= 3; $k++)
        {
            $coursParcours = new CoursParcours();

            $cours = $manager->getRepository(Cours::class)->find('id');
            $parcoursFormation = $manager->getRepository(ParcoursFormation::class)->find('id');

            $coursParcours->setCours($cours)
                ->setParcoursFormation($parcoursFormation)
                ->setOrdre($faker->numberBetween($min = 1, $max = 20));
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
