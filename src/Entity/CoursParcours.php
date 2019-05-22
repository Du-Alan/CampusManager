<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursParcoursRepository")
 */
class CoursParcours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParcoursFormation", inversedBy="coursParcours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcoursFormation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cours;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordre;

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

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

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
