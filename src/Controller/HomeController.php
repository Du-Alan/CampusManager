<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home_formateur")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/admin/home", name="home_admin")
     */
    public function indexAdmin()
    {
        return $this->render('home/indexAdmin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
