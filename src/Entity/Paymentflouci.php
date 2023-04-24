<?php

namespace App\Entity;

use App\Repository\PaymentflouciRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentflouciRepository::class)]
class Paymentflouci
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $payment_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "location_id", referencedColumnName: "location_id")]
    private ?Location $location_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "client_id", referencedColumnName: "client_id")]
    private ?Client $client_id = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(length: 255)]
    private ?string $transaction_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $Payment_status = null;

    public function getId(): ?int
    {
        return $this->payment_id;
    }

    public function getLocationId(): ?Location
    {
        return $this->location_id;
    }

    public function setLocationId(?Location $location_id): self
    {
        $this->location_id = $location_id;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): self
    {
        $this->client_id = $client_id;

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

    public function getTransactionId(): ?string
    {
        return $this->transaction_id;
    }

    public function setTransactionId(string $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    public function getPaymentStatus(): ?int
    {
        return $this->Payment_status;
    }

    public function setPaymentStatus(?int $Payment_status): self
    {
        $this->Payment_status = $Payment_status;

        return $this;
    }
}
