<?php

namespace App\Entity;

use App\Repository\NationaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NationaliteRepository::class)
 */
class Nationalite
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
     * @ORM\OneToMany(targetEntity=Agents::class, mappedBy="Nationalite")
     */
    private $Agents;

    /**
     * @ORM\OneToMany(targetEntity=Cibles::class, mappedBy="Nationalite")
     */
    private $Cibles;

    /**
     * @ORM\OneToMany(targetEntity=Contacts::class, mappedBy="Nationalite")
     */
    private $Contacts;

    public function __construct()
    {
        $this->Agents = new ArrayCollection();
        $this->Cibles = new ArrayCollection();
        $this->Contacts = new ArrayCollection();
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
            $Agents->setNationalite($this);
        }

        return $this;
    }

    public function removeAgents(Agents $Agents): self
    {
        if ($this->Agents->removeElement($Agents)) {
            // set the owning side to null (unless already changed)
            if ($Agents->getNationalite() === $this) {
                $Agents->setNationalite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cibles[]
     */
    public function getCibles(): Collection
    {
        return $this->Cibles;
    }

    public function addCible(Cibles $cible): self
    {
        if (!$this->Cibles->contains($cible)) {
            $this->Cibles[] = $cible;
            $cible->setNationalite($this);
        }

        return $this;
    }

    public function removeCible(Cibles $cible): self
    {
        if ($this->Cibles->removeElement($cible)) {
            // set the owning side to null (unless already changed)
            if ($cible->getNationalite() === $this) {
                $cible->setNationalite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getContacts(): Collection
    {
        return $this->Contacts;
    }

    public function addContact(Contacts $contact): self
    {
        if (!$this->Contacts->contains($contact)) {
            $this->Contacts[] = $contact;
            $contact->setNationalite($this);
        }

        return $this;
    }

    public function removeContact(Contacts $contact): self
    {
        if ($this->Contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getNationalite() === $this) {
                $contact->setNationalite(null);
            }
        }

        return $this;
    }
}
