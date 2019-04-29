<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscriptionCoursRepository")
 */
class InscriptionCours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idCoursPlanifie;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUtilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $idMachine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCoursPlanifie(): ?int
    {
        return $this->idCoursPlanifie;
    }

    public function setIdCoursPlanifie(int $idCoursPlanifie): self
    {
        $this->idCoursPlanifie = $idCoursPlanifie;

        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getIdMachine(): ?int
    {
        return $this->idMachine;
    }

    public function setIdMachine(int $idMachine): self
    {
        $this->idMachine = $idMachine;

        return $this;
    }
}
