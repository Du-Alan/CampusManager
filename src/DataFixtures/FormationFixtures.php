<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use App\Entity\ParcoursFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $formation = new Formation();
       $formation->setDateDebut(new \DateTime())
           ->setDescription("<p>Description de l'article</p>")
           ->setLieu("Nantes")
           ->getParcoursFormation();

        $manager->persist($formation);

        $manager->flush();
    }
}
