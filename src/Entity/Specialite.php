<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialiteRepository::class)
 */
class Specialite
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
     * @ORM\OneToMany(targetEntity=Missions::class, mappedBy="Specialite")
     */
    private $Missions;

    /**
     * @ORM\ManyToMany(targetEntity=Agents::class, mappedBy="Specialite")
     */
    private $Agents;

    public function __construct()
    {
        $this->Missions = new ArrayCollection();
        $this->Agents = new ArrayCollection();
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
            $mission->setSpecialite($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->Missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getSpecialite() === $this) {
                $mission->setSpecialite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Agents[]
     */
    public function getAgents(): Collection
    {
        return $this->Agents;
    }

    public function addAgents(Agents $Agents): self
    {
        if (!$this->Agents->contains($Agents)) {
            $this->Agents[] = $Agents;
            $Agents->addSpecialite($this);
        }

        return $this;
    }

    public function removeAgents(Agents $Agents): self
    {
        if ($this->Agents->removeElement($Agents)) {
            $Agents->removeSpecialite($this);
        }

        return $this;
    }

    public function addAgent(Agents $agent): self
    {
        if (!$this->Agents->contains($agent)) {
            $this->Agents[] = $agent;
            $agent->addSpecialite($this);
        }

        return $this;
    }

    public function removeAgent(Agents $agent): self
    {
        if ($this->Agents->removeElement($agent)) {
            $agent->removeSpecialite($this);
        }

        return $this;
    }
}
