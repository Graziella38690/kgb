<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MissionsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Validator\Collections;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @ORM\Entity(repositoryClass=MissionsRepository::class)
 */
class Missions
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $codemission;

    /**
     * @ORM\Column(type="date")
     */
    private $datededebut;

    /**
     * @ORM\Column(type="date")
     */
    private $datedefin;

    /**
     * @ORM\ManyToMany(targetEntity=Agents::class, inversedBy="Missions")
     */
    private $Agents;

    /**
     * @ORM\ManyToMany(targetEntity=Contacts::class, inversedBy="Missions")
     */
    private $Contacts;

    /**
     * @ORM\ManyToMany(targetEntity=Cibles::class, inversedBy="Missions")
     */
    private $Cibles;

    /**
     * @ORM\ManyToOne(targetEntity=Typemission::class, inversedBy="Missions")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Statumission::class, inversedBy="Missions")
     */
    private $statut;

    /**
     * @ORM\ManyToMany(targetEntity=Planques::class, inversedBy="Missions")
     */
    private $planque;

    /**
     * @ORM\ManyToOne(targetEntity=Specialite::class, inversedBy="Missions")
     */
    private $Specialite;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="Missions")
     */
    private $Pays;

    public function __construct()
    {
        $this->Agents = new ArrayCollection();
        $this->Contacts = new ArrayCollection();
        $this->Cibles = new ArrayCollection();
        $this->planque = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCodemission(): ?string
    {
        return $this->codemission;
    }

    public function setCodemission(string $codemission): self
    {
        $this->codemission = $codemission;

        return $this;
    }

    public function getDatededebut(): ?\DateTimeInterface
    {
        return $this->datededebut;
    }

    public function setDatededebut(\DateTimeInterface $datededebut): self
    {
        $this->datededebut = $datededebut;

        return $this;
    }

    public function getDatedefin(): ?\DateTimeInterface
    {
        return $this->datedefin;
    }

    public function setDatedefin(\DateTimeInterface $datedefin): self
    {
        $this->datedefin = $datedefin;

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
        }

        return $this;
    }

    public function removeAgents(Agents $Agents): self
    {
        $this->Agents->removeElement($Agents);

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
        }

        return $this;
    }

    public function removeContact(Contacts $contact): self
    {
        $this->Contacts->removeElement($contact);

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
        }

        return $this;
    }

    public function removeCible(Cibles $cible): self
    {
        $this->Cibles->removeElement($cible);

        return $this;
    }

    public function getType(): ?Typemission
    {
        return $this->type;
    }

    public function setType(?Typemission $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStatut(): ?Statumission
    {
        return $this->statut;
    }

    public function setStatut(?Statumission $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Planques[]
     */
    public function getPlanque(): Collection
    {
        return $this->planque;
    }

    public function addPlanque(Planques $planque): self
    {
        if (!$this->planque->contains($planque)) {
            $this->planque[] = $planque;
        }

        return $this;
    }

    public function removePlanque(Planques $planque): self
    {
        $this->planque->removeElement($planque);

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->Specialite;
    }

    public function setSpecialite(?Specialite $Specialite): self
    {
        $this->Specialite = $Specialite;

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

    public function addAgent(Agents $agent): self
    {
        if (!$this->Agents->contains($agent)) {
            $this->Agents[] = $agent;
        }

        return $this;
    }

    public function removeAgent(Agents $agent): self
    {
        $this->Agents->removeElement($agent);

        return $this;
    }


   


    
}