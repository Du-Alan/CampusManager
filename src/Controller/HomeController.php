<?php

namespace App\Controller;

use App\Entity\CoursParcours;
use App\Entity\Formation;
use App\Entity\Machine;
use App\Entity\Utilisateur;
use App\Form\AjoutStagiaireType;
use App\Form\CreateFormationType;
use App\Form\MachineType;
use App\Repository\FormationRepository;
use App\Repository\ParcoursFormationRepository;
use App\Tools\Helper;
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

        $abreviations = Helper::abrevation($formations);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'formations' => $formations,
            'abreviations' => $abreviations,
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

        //analyse la requête http passer en paramètre
        $form->handleRequest($request);

        //vérifie que le formulaire est soumis et que ses champs sont valides
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($formation);
            $manager->flush();

            //redirection vers la page listant tout les cours du parcours
            return $this->redirectToRoute('parcours_detail', ['id' => $formation->getId()
            ]);
        }
//

        return $this->render('formation/createFormation.html.twig', [
            'formFormation' => $form->createView()
        ]);
    }

    /**
     * @Route("/updateParcours/{id}", name="parcours_detail")
     */
    public function listParcours(Formation $formation ){

        /* @var $coursParcours CoursParcours[] */
    $coursParcours = $formation ->getParcoursFormation()->getCoursParcours();


        return $this->render('formation/parcoursDetail.html.twig', [
            'formation' => $formation, 'coursParcours' => $coursParcours,
        ]);
    }

    /**
     * @Route("/ajoutStagiaire", name="stagiaire_add")
     */
    public function add(Request $request, ObjectManager $manager){

        //Instancie l'objet Utilisateur et Machine
        $stagiaire = new Utilisateur();
        $machine = new Machine();

        //Instancie le formulaire avec les paramètres de l'entité "utilisateur" et "machine"
        $form = $this->createForm(AjoutStagiaireType::class, $stagiaire);
        $form2= $this->createForm(MachineType::class, $machine);

        //analyse la requête
        $form->handleRequest($request);

        //vérifie que le formulaire est soumis et que ses champs sont valides
        if($form AND $form2 ->isSubmitted() AND $form AND $form2 ->isValid())
        {
            $stagiaire->setRoles(["ROLE_STAGIAIRE"]);

            $manager->persist($stagiaire);
            $manager->persist($machine);
            $manager->flush();

            //redirection vers la page listant tout les cours du parcours
            return $this->redirectToRoute('home_formateur');
        }

        return $this->render('formation/inscriptionStagiaire.html.twig', [
            'controller_name' => 'HomeController',
            'formStagiaire' => $form->createView(),
            'formMachine' => $form2->createView()
        ]);
    }

    /**
     * @Route ("/deleteFormation/{id}", name="formation_delete", methods="DELETE")
     */
    public function deleteFormation(Formation $formation, ObjectManager $manager, Request $request)
    {
        if($this->isCsrfTokenValid('delete' . $formation->getId(), $request->get('_token')))
        {
            $manager->remove($formation);
            $manager->flush();
        }
        return $this->redirectToRoute('home_formateur');
    }
}

