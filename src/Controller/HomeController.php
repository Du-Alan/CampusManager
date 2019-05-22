<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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
    public function createFormation(Request $request, ObjectManager $manager)
    {
        $formation = new Formation();

        $form = $this->createFormBuilder($formation)
            ->add('parcoursFormation', TextType::class)
            ->add('dateDebut', DateType::class)
            ->add('lieu', ChoiceType::class, [
                'choices' => [
                    'Nantes' => 0,
                    'Le Mans' => 1,
                    'Rennes ' => 3,
                    'Laval' => 4,
                    'Niort' => 5,
                    'Roche sur Yon' => 6,
                    'Angers' => 7,
                    'Quimper' => 8
                ]
            ])
            ->getForm();

        return $this->render('formation/createFormation.html.twig', [
            'formFormation' => $form->createView()
        ]);
    }

}
