<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParcoursFormation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcoursFormation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InscriptionFormation", mappedBy="formation")
     */
    private $inscriptionFormations;

    public function __construct()
    {
        $this->inscriptionFormations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParcoursFormation(): ?ParcoursFormation
    {
        return $this->parcoursFormation;
    }

    public function setParcoursFormation(?ParcoursFormation $parcoursFormation): self
    {
        $this->parcoursFormation = $parcoursFormation;

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

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin): void
    {
        $this->dateFin = $dateFin;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
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

    /**
     * @return Collection|InscriptionFormation[]
     */
    public function getInscriptionFormations(): Collection
    {
        return $this->inscriptionFormations;
    }

    public function addInscriptionFormation(InscriptionFormation $inscriptionFormation): self
    {
        if (!$this->inscriptionFormations->contains($inscriptionFormation)) {
            $this->inscriptionFormations[] = $inscriptionFormation;
            $inscriptionFormation->setFormation($this);
        }

        return $this;
    }

    public function removeInscriptionFormation(InscriptionFormation $inscriptionFormation): self
    {
        if ($this->inscriptionFormations->contains($inscriptionFormation)) {
            $this->inscriptionFormations->removeElement($inscriptionFormation);
            // set the owning side to null (unless already changed)
            if ($inscriptionFormation->getFormation() === $this) {
                $inscriptionFormation->setFormation(null);
            }
        }

        return $this;
    }
}
