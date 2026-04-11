<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $prev_img = null;

    #[ORM\Column(length: 255)]
    private ?string $desc_img = null;

    /**
     * @var Collection<int, Workers>
     */
    #[ORM\ManyToMany(targetEntity: Workers::class, mappedBy: 'service')]
    private Collection $workers;

    public function __construct()
    {
        $this->workers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrevImg(): ?string
    {
        return $this->prev_img;
    }

    public function setPrevImg(string $prev_img): static
    {
        $this->prev_img = $prev_img;

        return $this;
    }

    public function getDescImg(): ?string
    {
        return $this->desc_img;
    }

    public function setDescImg(string $desc_img): static
    {
        $this->desc_img = $desc_img;

        return $this;
    }

    /**
     * @return Collection<int, Workers>
     */
    public function getWorkers(): Collection
    {
        return $this->workers;
    }

    public function addWorker(Workers $worker): static
    {
        if (!$this->workers->contains($worker)) {
            $this->workers->add($worker);
            $worker->addService($this);
        }

        return $this;
    }

    public function removeWorker(Workers $worker): static
    {
        if ($this->workers->removeElement($worker)) {
            $worker->removeService($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getTitle();
    }
}
