<?php

namespace App\Entity;

use App\Repository\CiblesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CiblesRepository::class)
 */
class Cibles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $datedenaissance;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomdecode;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, mappedBy="Cibles")
     */
    private $missions;

    /**
     * @ORM\ManyToOne(targetEntity=nationalite::class, inversedBy="Cibles")
     */
    private $nationalite;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    public function getNomdecode(): ?string
    {
        return $this->nomdecode;
    }

    public function setNomdecode(string $nomdecode): self
    {
        $this->nomdecode = $nomdecode;

        return $this;
    }

    /**
     * @return Collection|Missions[]
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Missions $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions[] = $mission;
            $mission->addCible($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeCible($this);
        }

        return $this;
    }

    public function getNationalite(): ?nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?nationalite $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }
}
