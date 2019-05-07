<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // récupère une erreur de connexion si il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();
        // récupère le dernier nom entré par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/registration", name="security_registration")
     */
    public function registration()
    {
        //Instancie l'objet Utilisateur
        $user = new Utilisateur();

        //Instancie le formulaire avec le paramètre $user
        $form = $this->createForm(RegistrationType::class, $user);

        //affiche la template ciblé
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
