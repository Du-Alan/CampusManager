<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationType;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
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
     * @Route("/admin/registration", name="security_registration", methods="GET|POST")
     */
    public function registration(Request $request, ObjectManager $manager,
                                 UserPasswordEncoderInterface $encoder)
    {
        //Instancie l'objet Utilisateur
        $user = new Utilisateur();
        //Instancie le formulaire avec le paramètre $user
        $form = $this->createForm(RegistrationType::class, $user);
        //analyse la requête
        $form->handleRequest($request);

        //vérifie que le formulaire est soumis et que ses champs soit valides
        if($form->isSubmitted() && $form->isValid())
        {
            //l'encoder dans le security.yaml va se charger de hasher le mot de passe
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);
            $manager->flush();
            $this->addFlash('sucess', 'Utilisateur crée avec succès');

            //redirection vers la même page pour recréer un nouvel utilisateur
            return $this->redirectToRoute('security_registration');
        }

        //affiche la template ciblé
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/listUtilisateurs", name="security_list", methods="GET|POST")
     */
    public function listAction(UtilisateurRepository $repo)
    {

    $utilisateurs = $repo->findAll();

        return $this->render('security/listUtilisateur.html.twig', [
            'controller_name' => 'SecurityController',
            'utilisateurs' => $utilisateurs
        ]);
    }

    /**
     * @Route ("/admin/Utilisateur/{id}", name="security_delete", methods="DELETE")
     * @param Utilisateur $utilisateur
     * @param ObjectManager $em
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteUser(Utilisateur $utilisateur, ObjectManager $em, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $utilisateur->getId(), $request->get('_token'))) {
            $em->remove($utilisateur);
            $em->flush();
        }
        return $this->redirectToRoute('security_list');
    }


    /**
     * @Route("/logout",name="security_logout")
     */
    public function logout(){}
}
