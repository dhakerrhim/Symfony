<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $client_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_nom = null;

    public function getId(): ?int
    {
        return $this->client_id;
    }

    public function getClientNom(): ?string
    {
        return $this->client_nom;
    }

    public function setClientNom(?string $client_nom): self
    {
        $this->client_nom = $client_nom;

        return $this;
    }
    public function __toString(): string
    {
         return   $this->client_id;
    }
}
