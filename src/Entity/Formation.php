<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idFormation;

    /**
     * @ORM\Column(type="integer")
     */
    private $idParcoursFormation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lieu;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function getIdParcoursFormation(): ?int
    {
        return $this->idParcoursFormation;
    }

    public function setIdParcoursFormation(int $idParcoursFormation): self
    {
        $this->idParcoursFormation = $idParcoursFormation;

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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
