<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursPlanifieRepository")
 */
class CoursPlanifie
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
    private $idCours;

    /**
     * @ORM\Column(type="integer")
     */
    private $idFormation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

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

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }

    public function setIdCours(int $idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function setIdFormation(int $idFormation): self
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }
}
