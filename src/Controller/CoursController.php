<?php

namespace App\Controller;


use App\Entity\Cours;
use App\Repository\CoursRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CoursController extends AbstractController
{
    /**
     * CoursController constructor.
     * @param CoursRepository $repository
     * @param ObjectManager $em
     */
    public function __construct(CoursRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/editCours/{id}", name="cours_edit")
     * @param Cours $cours
     */
    public function edit(Cours $cours)
    {
//        Modifier toute les formations qui ont ce cours avec le méthode SommeDuree(Helper)
    }
}

//Vidéo 21.03 pour le construct