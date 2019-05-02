<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailParcoursFormationRepository")
 */
class DetailParcoursFormation
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idParcoursFormation;


    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $idCours;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordre;

    public function getIdParcoursFormation(): ?int
    {
        return $this->idParcoursFormation;
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

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }
}
