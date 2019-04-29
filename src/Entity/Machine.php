<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MachineRepository")
 */
class Machine
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
    private $idMachine;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $passerelle;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPasserelle(): ?string
    {
        return $this->passerelle;
    }

    public function setPasserelle(string $passerelle): self
    {
        $this->passerelle = $passerelle;

        return $this;
    }
}
