<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\CoursParcours;
use App\Entity\Formation;
use App\Entity\InscriptionFormation;
use App\Entity\Machine;
use App\Entity\ParcoursFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class InscriptionFormationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($k = 1; $k <= 10; $k++)
        {
            $inscriptionFormation = new InscriptionFormation();


            $inscriptionFormation->setFormation($this->getReference('formation'.$k))
            ->setMachine($this->getReference('machine'.$k))
            ->setUtilisateur($this->getReference('user2'));
            $manager->persist($inscriptionFormation);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            FormationFixtures::class,
            MachineFixtures::class,
        );
    }
}
