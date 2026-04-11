<?php

namespace App\Entity;

use App\Repository\CounterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CounterRepository::class)]
class Counter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $val = null;

    #[ORM\Column(length: 255)]
    private ?string $sym = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $icons = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mseconds = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getVal(): ?int
    {
        return $this->val;
    }

    public function setVal(int $val): static
    {
        $this->val = $val;

        return $this;
    }

    public function getSym(): ?string
    {
        return $this->sym;
    }

    public function setSym(string $sym): static
    {
        $this->sym = $sym;

        return $this;
    }

    public function getIcons(): ?string
    {
        return $this->icons;
    }

    public function setIcons(?string $icons): static
    {
        $this->icons = $icons;

        return $this;
    }

    public function getMseconds(): ?string
    {
        return $this->mseconds;
    }

    public function setMseconds(?string $mseconds): static
    {
        $this->mseconds = $mseconds;

        return $this;
    }
}
