<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\CoursPlanifie;
use App\Entity\Machine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MachineFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i=1;$i<=10;$i++)
        {
            $machine = new Machine();
            $machine->setNom($faker->domainWord)
            ->setUsername($faker->userName)
            ->setMotdepasse($faker->password)
            ->setPasserelle($faker->ipv4);


            $manager->persist($machine);
            $this->addReference('machine'.$i,$machine);
        }
        $manager->flush();
    }
}
