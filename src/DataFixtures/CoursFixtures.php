<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Repository\RepositoryFactory;

class CoursFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i=1;$i<=10;$i++)
        {
            $cours = new Cours();
            $cours->setNom($faker->sentence())
                ->setDateDebut($faker->dateTime($min = 'now', $timezone = 'Europe/Paris'))
                ->setDateFin($faker->dateTime($min = 'now', $timezone = 'Europe/Paris'))
                ->setAvecECF($faker->boolean())
                ->setRef($faker->ean8)
                ->setUtilisateur($this->getReference('user2'));

            $manager->persist($cours);
            $this->addReference('cours'.$i, $cours);

        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            UtilisateurFixtures::class,
        );
    }
}
