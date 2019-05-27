<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\CreateFormationType;
use App\Repository\FormationRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        //Instancie l'objet formation
        $formation = new Formation();

        //Instancie le formulaire avec les paramètres de l'entité "formation"
        $form = $this->createForm(CreateFormationType::class, $formation);

        //analyse la requête
        $form->handleRequest($request);
        dump($formation);

        //vérifie que le formulaire est soumis et que ses champs sont valides
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($formation);
            $manager->flush();

            //redirection vers la page listant tout les cours du parcours
            return $this->redirectToRoute('parcours_detail');
        }
//

        return $this->render('formation/createFormation.html.twig', [
            'formFormation' => $form->createView()
        ]);
    }

    /**
     * @Route("/updateParcours", name="parcours_detail")
     */
    public function listParcours(){
        return $this->render('formation/parcoursDetail.html.twig');
    }
//    /**
//     * @Route("/ajoutStagiaire",name="formation_add"
//     */
//    public function add(){}
}
