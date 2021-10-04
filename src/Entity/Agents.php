<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentsRepository::class)
 */
class Agents
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
     * @ORM\Column(type="string", length=15)
     */
    private $codeidentification;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, mappedBy="Agents")
     */
    private $missions;

    /**
     * @ORM\ManyToOne(targetEntity=nationalite::class, inversedBy="Agents")
     */
    private $nationalite;

    /**
     * @ORM\ManyToMany(targetEntity=specialite::class, inversedBy="Agents")
     */
    private $specialite;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
        $this->specialite = new ArrayCollection();
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

    public function getCodeidentification(): ?string
    {
        return $this->codeidentification;
    }

    public function setCodeidentification(string $codeidentification): self
    {
        $this->codeidentification = $codeidentification;

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
            $mission->addAgents($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeAgents($this);
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

    /**
     * @return Collection|specialite[]
     */
    public function getSpecialite(): Collection
    {
        return $this->specialite;
    }

    public function addSpecialite(specialite $specialite): self
    {
        if (!$this->specialite->contains($specialite)) {
            $this->specialite[] = $specialite;
        }

        return $this;
    }

    public function removeSpecialite(specialite $specialite): self
    {
        $this->specialite->removeElement($specialite);

        return $this;
    }
}
