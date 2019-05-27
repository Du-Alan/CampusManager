<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurFixtures extends Fixture
{
    private $encoder;

    /**
     * UtilisateurFixtures constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Utilisateur();
        $user->setEmail(sprintf('admin@admin.fr'))
            ->setPassword($this->encoder->encodePassword($user,'azerty'))
            ->setUsername('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setNom('Durand')
            ->setPrenom('Alan')
            ->setCivilite(0);

        $user2 = new Utilisateur();
        $user2->setEmail(sprintf('noAdmin@noAdmin.fr'))
            ->setPassword($this->encoder->encodePassword($user2,'azerty'))
            ->setUsername('noAdmin')
            ->setRoles(['ROLE_USER'])
            ->setNom('Durand')
            ->setPrenom('Alan')
            ->setCivilite(1);
        $this->addReference('user2', $user2);
        $faker = \Faker\Factory::create('fr_FR');

        for ( $i=1 ; $i <= 4 ; $i++ )
        {
            $user3 = new Utilisateur();
            $user3->setEmail($faker->freeEmail)
                ->setPassword($this->encoder->encodePassword($user3,'qsdfgh'))
                ->setUsername($faker->userName)
                ->setRoles(['ROLE_USER'])
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setCivilite($faker->numberBetween($min=0,$max=1));

            $manager->persist($user3);
        }

        $manager->persist($user);
        $manager->persist($user2);

        $manager->flush();
    }
}
