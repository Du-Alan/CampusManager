<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     */
    private $idParcoursFormation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;

    public function getId(): ?int
    {
        return $this->id;
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
