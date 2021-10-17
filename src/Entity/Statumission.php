<?php

namespace App\Entity;

use App\Repository\StatutmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=StatutmissionRepository::class)
 */
class Statumission
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
     * @ORM\OneToMany(targetEntity=Missions::class, mappedBy="statut")
     */
    private $Missions;

    public function __construct()
    {
        $this->Missions = new ArrayCollection();
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
            $mission->setStatut($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->Missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getStatut() === $this) {
                $mission->setStatut(null);
            }
        }

        return $this;
    }
}
