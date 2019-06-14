<?php

namespace App\Controller;


use App\Entity\Cours;
use App\Entity\CoursParcours;
use App\Entity\Formation;
use App\Form\CoursType;
use App\Repository\CoursRepository;
use App\Repository\FormationRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CoursController extends AbstractController
{
    /**
     * CoursController constructor.
     * @var CoursRepository
     */

    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(CoursRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/listCours/parcours/{id}", name="parcours_detail")
     * @param Formation $formation
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listCoursParcours(Formation $formation ){

        /* @var $coursParcours CoursParcours[] */
        $coursParcours = $formation ->getParcoursFormation()->getCoursParcours();


        return $this->render('formation/parcoursDetail.html.twig', [
            'formation' => $formation,
            'coursParcours' => $coursParcours,
        ]);
    }
    /**
     * @Route("/editCours/{id}", name="cours_edit")
     * @param Cours $cours
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CoursParcours $coursParcours, Request $request)
    {

        $cours = $coursParcours->getCours();

        $id = $this->getDoctrine()->getRepository(Formation::class)->findOneByParcoursFormation($coursParcours->getParcoursFormation());

        $form = $this->createForm(CoursType::class, $cours);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
        }

        return $this->render('cours/edit.html.twig', [
            'coursParcours' => $coursParcours,
            'cours' => $cours,
            'formCours' => $form->createView(),
        ]);
//     TODO   Modifier toute les formations qui ont ce cours avec le méthode SommeDuree(Helper)
    }
}


//Vidéo 21.03 pour le construct