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
    private ?int $location_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debut_location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fin_location = null;

    #[ORM\Column(length: 255)]

    private ?string $destination = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(nullable: true)]
    private ?int $status = null;

    #[ORM\ManyToOne(targetEntity: Client::class)]
  
#[ORM\JoinColumn(name: "client_id", referencedColumnName: "client_id")]
    private ?Client $client_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "vehicule_id", referencedColumnName: "vehicule_id")]
    private ?Vehicule $vehicule_id = null;

  
    public function getId(): ?int
    {
        return $this->location_id;
    }

    public function getDebutLocation(): ?\DateTimeInterface
    {
        return $this->debut_location;
    }

    public function setDebutLocation(\DateTimeInterface $debut_location): self
    {
        $this->debut_location = $debut_location;

        return $this;
    }

    public function getFinLocation(): ?\DateTimeInterface
    {
        return $this->fin_location;
    }

    public function setFinLocation(\DateTimeInterface $fin_location): self
    {
        $this->fin_location = $fin_location;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

   
    public function getClientId():?Client
    {
        return $this->client_id;
    }

    public function setClientId(Client $client_id): self
    {
        $this->client_id = $client_id;

        return $this;

      
    }

    public function removeClientId(Client $clientId): self
    {
        $this->client_id->removeElement($clientId);

        return $this;
    }

    public function getVehiculeId(): ?Vehicule
    {
        return $this->vehicule_id;
    }

    public function setVehiculeId(?Vehicule $vehicule_id): self
    {
        $this->vehicule_id = $vehicule_id;

        return $this;
    }
    public function __toString(): string
    {
         return   $this->location_id;
    }
}
