<?php

namespace App\Entity;

use App\Repository\TasksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TasksRepository::class)]
class Tasks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'tasks')]
    private Collection $reservations;

    /**
     * @var Collection<int, RepairRate>
     */
    #[ORM\OneToMany(targetEntity: RepairRate::class, mappedBy: 'tasks')]
    private Collection $repairRates;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->repairRates = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setTasks($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getTasks() === $this) {
                $reservation->setTasks(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RepairRate>
     */
    public function getRepairRates(): Collection
    {
        return $this->repairRates;
    }

    public function addRepairRate(RepairRate $repairRate): static
    {
        if (!$this->repairRates->contains($repairRate)) {
            $this->repairRates->add($repairRate);
            $repairRate->setTasks($this);
        }

        return $this;
    }

    public function removeRepairRate(RepairRate $repairRate): static
    {
        if ($this->repairRates->removeElement($repairRate)) {
            // set the owning side to null (unless already changed)
            if ($repairRate->getTasks() === $this) {
                $repairRate->setTasks(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
