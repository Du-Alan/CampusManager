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
            ->setNom('durand')
            ->setPrenom('alan')
            ->setCivilite(0);

        $user2 = new Utilisateur();
        $user2->setEmail(sprintf('noAdmin@noAdmin.fr'))
            ->setPassword($this->encoder->encodePassword($user2,'azerty'))
            ->setUsername('noAdmin')
            ->setRoles(['ROLE_USER'])
            ->setNom('durand')
            ->setPrenom('alan')
            ->setCivilite(1);



        $manager->persist($user);
        $manager->persist($user2);
        $manager->flush();
    }
}
