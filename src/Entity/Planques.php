<?php

namespace App\Entity;

use App\Repository\PlanquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanquesRepository::class)
 */
class Planques
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
    private $codeidentification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, mappedBy="planque")
     */
    private $Missions;

    /**
     * @ORM\ManyToOne(targetEntity=Typeplanque::class, inversedBy="Planques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="planques")
     */
    private $Pays;




    
    

    public function __construct()
    {
        $this->Missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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
            $mission->addPlanque($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->Missions->removeElement($mission)) {
            $mission->removePlanque($this);
        }

        return $this;
    }



    public function getType(): ?Typeplanque
    {
        return $this->type;
    }

    public function setType(?Typeplanque $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->Pays;
    }

    public function setPays(?Pays $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    
}
