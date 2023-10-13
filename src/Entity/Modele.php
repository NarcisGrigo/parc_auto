<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeleRepository::class)]
class Modele
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_modele = null;

    #[ORM\Column]
    private ?int $annee_modele = null;

    #[ORM\Column(length: 255)]
    private ?string $conso = null;

    #[ORM\ManyToMany(targetEntity: Location::class, mappedBy: 'modele')]
    private Collection $locations;

    #[ORM\ManyToMany(targetEntity: Locateur::class, mappedBy: 'modele')]
    private Collection $locateurs;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->locateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeModele(): ?string
    {
        return $this->type_modele;
    }

    public function setTypeModele(string $type_modele): static
    {
        $this->type_modele = $type_modele;

        return $this;
    }

    public function getAnneeModele(): ?int
    {
        return $this->annee_modele;
    }

    public function setAnneeModele(int $annee_modele): static
    {
        $this->annee_modele = $annee_modele;

        return $this;
    }

    public function getConso(): ?string
    {
        return $this->conso;
    }

    public function setConso(string $conso): static
    {
        $this->conso = $conso;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
            $location->addModele($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): static
    {
        if ($this->locations->removeElement($location)) {
            $location->removeModele($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Locateur>
     */
    public function getLocateurs(): Collection
    {
        return $this->locateurs;
    }

    public function addLocateur(Locateur $locateur): static
    {
        if (!$this->locateurs->contains($locateur)) {
            $this->locateurs->add($locateur);
            $locateur->addModele($this);
        }

        return $this;
    }

    public function removeLocateur(Locateur $locateur): static
    {
        if ($this->locateurs->removeElement($locateur)) {
            $locateur->removeModele($this);
        }

        return $this;
    }
}
