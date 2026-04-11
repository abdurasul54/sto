<?php

namespace App\Entity;

use App\Repository\RepairRateRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepairRateRepository::class)]
class RepairRate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $messgae = null;

    #[ORM\ManyToOne(inversedBy: 'repairRates')]
    private ?Tasks $tasks = null;

    #[ORM\Column(length: 15)]
    private ?string $phone_number = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMessgae(): ?string
    {
        return $this->messgae;
    }

    public function setMessgae(string $messgae): static
    {
        $this->messgae = $messgae;

        return $this;
    }

    public function getTasks(): ?Tasks
    {
        return $this->tasks;
    }

    public function setTasks(?Tasks $tasks): static
    {
        $this->tasks = $tasks;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }
}
