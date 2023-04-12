<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $vehicule_id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Marque is required")]
    #[Assert\Length(min: 2, max: 255, minMessage: "Marque must be at least {{ limit }} characters long", maxMessage: "Marque cannot be longer than {{ limit }} characters")]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Matricule is required")]
    #[Assert\Length(min: 2, max: 255, minMessage: "Matricule must be at least {{ limit }} characters long", maxMessage: "Matricule cannot be longer than {{ limit }} characters")]
    private ?string $matricule = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Couleur is required")]
    #[Assert\Length(min: 2, max: 255, minMessage: "Couleur must be at least {{ limit }} characters long", maxMessage: "Couleur cannot be longer than {{ limit }} characters")]
    private ?string $couleur = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "Prix is required")]
    #[Assert\Positive(message: "Prix must be a positive number")]
    private ?float $prix = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "Nombre du place is required")]
    #[Assert\PositiveOrZero(message: "Nombre du place must be a positive or zero number")]
    private ?int $nb_place = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Choice(choices: [0, 1], message: "Invalid status")]
    private ?int $status = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Image is required")]
   
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->vehicule_id;
    }
    public function setId(int $vehicule_id ): self
    {
      $this->vehicule_id;
    }
    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nb_place;
    }

    public function setNbPlace(int $nb_place): self
    {
        $this->nb_place = $nb_place;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function __toString(): string
    {
         return   $this->vehicule_id;
    }
}
