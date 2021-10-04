<?php

namespace App\Entity;

use App\Repository\TypeplanqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeplanqueRepository::class)
 */
class Typeplanque
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
     * @ORM\OneToMany(targetEntity=Planques::class, mappedBy="type")
     */
    private $Planques;

    public function __construct()
    {
        $this->Planques = new ArrayCollection();
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
     * @return Collection|Planques[]
     */
    public function getPlanques(): Collection
    {
        return $this->Planques;
    }

    public function addPlanque(Planques $planque): self
    {
        if (!$this->Planques->contains($planque)) {
            $this->Planques[] = $planque;
            $planque->setType($this);
        }

        return $this;
    }

    public function removePlanque(Planques $planque): self
    {
        if ($this->Planques->removeElement($planque)) {
            // set the owning side to null (unless already changed)
            if ($planque->getType() === $this) {
                $planque->setType(null);
            }
        }

        return $this;
    }
}
