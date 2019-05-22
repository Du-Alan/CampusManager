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
        for($i=1;$i<=3;$i++)
        {
            $cours = new Cours();
            $user = null;
            $user = $manager->getRepository(Utilisateur::class)->findOneBy(['roles'=='ROLES_USER']);
            $cours->setNom($faker->sentence())
                ->setDateDebut($faker->dateTime($min = 'now', $timezone = 'Europe/Paris'))
                ->setDateFin($faker->dateTime($min = 'now', $timezone = 'Europe/Paris'))
                ->setAvecECF($faker->boolean())
                ->setRef($faker->sentence())
                ->setUtilisateur($user);

            $manager->persist($cours);

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
