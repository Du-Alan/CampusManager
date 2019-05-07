<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParcoursFormationRepository")
 */
class ParcoursFormation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CoursParcours", mappedBy="parcoursFormation")
     */
    private $coursParcours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    public function __construct()
    {
        $this->coursParcours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|CoursParcours[]
     */
    public function getCoursParcours(): Collection
    {
        return $this->coursParcours;
    }

    public function addCoursParcour(CoursParcours $coursParcour): self
    {
        if (!$this->coursParcours->contains($coursParcour)) {
            $this->coursParcours[] = $coursParcour;
            $coursParcour->setParcoursFormation($this);
        }

        return $this;
    }

    public function removeCoursParcour(CoursParcours $coursParcour): self
    {
        if ($this->coursParcours->contains($coursParcour)) {
            $this->coursParcours->removeElement($coursParcour);
            // set the owning side to null (unless already changed)
            if ($coursParcour->getParcoursFormation() === $this) {
                $coursParcour->setParcoursFormation(null);
            }
        }

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
}
