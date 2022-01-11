<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
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
     * @ORM\OneToMany(targetEntity=Missions::class, mappedBy="Pays")
     */
    private $Missions;

    /**
     * @ORM\OneToOne(targetEntity=Nationalite::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $Nationalite;

    /**
     * @ORM\OneToMany(targetEntity=Pays::class, mappedBy="pays")
     */
    private $pays;

    /**
     * @ORM\OneToMany(targetEntity=Planques::class, mappedBy="Pays")
     */
    private $planques;

    
   

    public function __construct()
    {
        $this->Missions = new ArrayCollection();
       
        $this->pays = new ArrayCollection();
        $this->planques = new ArrayCollection();
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
            $mission->setPays($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->Missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getPays() === $this) {
                $mission->setPays(null);
            }
        }

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->Nationalite;
    }

    public function setNationalite(Nationalite $Nationalite): self
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }

    /**
     * @return Collection|Planques[]
     */
    public function getPlanques(): Collection
    {
        return $this->planques;
    }

    public function addPlanque(Planques $planque): self
    {
        if (!$this->planques->contains($planque)) {
            $this->planques[] = $planque;
            $planque->setPays($this);
        }

        return $this;
    }

    public function removePlanque(Planques $planque): self
    {
        if ($this->planques->removeElement($planque)) {
            // set the owning side to null (unless already changed)
            if ($planque->getPays() === $this) {
                $planque->setPays(null);
            }
        }

        return $this;
    }

   

 


    

    

   
}
