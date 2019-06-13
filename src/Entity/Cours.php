<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursRepository")
 */
class Cours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="boolean")
     */
    private $avecECF;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ref;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CoursPlanifie", mappedBy="cours")
     */
    private $coursPlanifies;

    public function __construct()
    {
        $this->coursPlanifies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }


    public function setDuree($duree): self
    {
        $this->duree = $duree;

        return $this;
    }


    public function getAvecECF(): ?bool
    {
        return $this->avecECF;
    }

    public function setAvecECF(bool $avecECF): self
    {
        $this->avecECF = $avecECF;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * @return Collection|CoursPlanifie[]
     */
    public function getCoursPlanifies(): Collection
    {
        return $this->coursPlanifies;
    }

    public function addCoursPlanify(CoursPlanifie $coursPlanify): self
    {
        if (!$this->coursPlanifies->contains($coursPlanify)) {
            $this->coursPlanifies[] = $coursPlanify;
            $coursPlanify->setCours($this);
        }

        return $this;
    }

    public function removeCoursPlanify(CoursPlanifie $coursPlanify): self
    {
        if ($this->coursPlanifies->contains($coursPlanify)) {
            $this->coursPlanifies->removeElement($coursPlanify);
            // set the owning side to null (unless already changed)
            if ($coursPlanify->getCours() === $this) {
                $coursPlanify->setCours(null);
            }
        }

        return $this;
    }
}
