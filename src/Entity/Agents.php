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
    private $Missions;

    /**
     * @ORM\ManyToOne(targetEntity=Nationalite::class, inversedBy="Agents")
     */
    private $Nationalite;

    /**
     * @ORM\ManyToMany(targetEntity=Specialite::class, inversedBy="Agents")
     */
    private $Specialite;

    public function __construct()
    {
        $this->Missions = new ArrayCollection();
        $this->Specialite = new ArrayCollection();
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
        return $this->Missions;
    }

    public function addMission(Missions $mission): self
    {
        if (!$this->Missions->contains($mission)) {
            $this->Missions[] = $mission;
            $mission->addAgents($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->Missions->removeElement($mission)) {
            $mission->removeAgents($this);
        }

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->Nationalite;
    }

    public function setNationalite(?Nationalite $Nationalite): self
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }

    /**
     * @return Collection|Specialite[]
     */
    public function getSpecialite(): Collection
    {
        return $this->Specialite;
    }

    public function addSpecialite(Specialite $Specialite): self
    {
        if (!$this->Specialite->contains($Specialite)) {
            $this->Specialite[] = $Specialite;
        }

        return $this;
    }

    public function removeSpecialite(Specialite $Specialite): self
    {
        $this->Specialite->removeElement($Specialite);

        return $this;
    }
}
