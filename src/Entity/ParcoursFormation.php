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
    private $idParcoursFormation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;


    public function getIdParcoursFormation(): ?int
    {
        return $this->idParcoursFormation;
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
