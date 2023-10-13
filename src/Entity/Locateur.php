<?php

namespace App\Entity;

use App\Repository\LocateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocateurRepository::class)]
class Locateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $age = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\ManyToOne(inversedBy: 'locateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?voiture $voiture = null;

    #[ORM\ManyToMany(targetEntity: modele::class, inversedBy: 'locateurs')]
    private Collection $modele;

    public function __construct()
    {
        $this->modele = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVoiture(): ?voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?voiture $voiture): static
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * @return Collection<int, modele>
     */
    public function getModele(): Collection
    {
        return $this->modele;
    }

    public function addModele(modele $modele): static
    {
        if (!$this->modele->contains($modele)) {
            $this->modele->add($modele);
        }

        return $this;
    }

    public function removeModele(modele $modele): static
    {
        $this->modele->removeElement($modele);

        return $this;
    }
}
