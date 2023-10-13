<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_location = null;

    #[ORM\Column]
    private ?int $nb_jr_location = null;

    #[ORM\Column]
    private ?int $prix_location = null;

    #[ORM\ManyToMany(targetEntity: modele::class, inversedBy: 'locations')]
    private Collection $modele;

    public function __construct()
    {
        $this->modele = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLocation(): ?\DateTimeInterface
    {
        return $this->date_location;
    }

    public function setDateLocation(\DateTimeInterface $date_location): static
    {
        $this->date_location = $date_location;

        return $this;
    }

    public function getNbJrLocation(): ?int
    {
        return $this->nb_jr_location;
    }

    public function setNbJrLocation(int $nb_jr_location): static
    {
        $this->nb_jr_location = $nb_jr_location;

        return $this;
    }

    public function getPrixLocation(): ?int
    {
        return $this->prix_location;
    }

    public function setPrixLocation(int $prix_location): static
    {
        $this->prix_location = $prix_location;

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
