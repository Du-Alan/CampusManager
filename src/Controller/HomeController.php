<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home_formateur")
     */
    public function index(FormationRepository $repository)
    {
        $formations = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'formations' => $formations
        ]);
    }
    /**
     * @Route("/formation/new", name="formation_create")
     */
    public function createFormation()
    {

    }

}
