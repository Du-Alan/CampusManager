<?php

namespace App\DataFixtures;

use App\Entity\ParcoursFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ParcoursFormationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($j = 1; $j <= 3; $j++)
        {
            $parcours = new ParcoursFormation();
            $parcours->setLibelle($faker->sentence);

            $manager->persist($parcours);
            $this->addReference('parcours'.$j,$parcours);
        }

        $manager->flush();
    }

}
