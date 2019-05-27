<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\CoursPlanifie;
use App\Entity\Formation;
use App\Entity\ParcoursFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FormationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i=1;$i<=10;$i++)
        {
            $formation = new Formation();
            $formation->setDateDebut($faker->dateTime($min = 'now', $timezone = 'Europe/Paris'))
                ->setParcoursFormation($this->getReference('parcours'.$i))
                ->setLieu($faker->randomElement(['Nantes','Le Mans','Rennes ','Laval','Niort', 'Roche sur Yon', 'Angers','Quimper']))
                ->setDateFin($faker->dateTime($min = 'now', $timezone ='Europe/Paris'));

            $manager->persist($formation);
            $this->addReference('formation'.$i, $formation);

        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ParcoursFormationFixtures::class
        );
    }
}
