<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $date = null;

    #[ORM\Column]
    private ?int $signifiance = null;

    #[ORM\Column]
    private ?int $urgency = null;

    #[ORM\Column]
    private ?bool $isDone = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $doneDate = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Group $taskGroup = null;

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

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(?\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSignifiance(): ?int
    {
        return $this->signifiance;
    }

    public function setSignifiance(int $signifiance): static
    {
        $this->signifiance = $signifiance;

        return $this;
    }

    public function getUrgency(): ?int
    {
        return $this->urgency;
    }

    public function setUrgency(int $urgency): static
    {
        $this->urgency = $urgency;

        return $this;
    }

    public function isDone(): ?bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): static
    {
        $this->isDone = $isDone;

        return $this;
    }

    public function getDoneDate(): ?\DateTime
    {
        return $this->doneDate;
    }

    public function setDoneDate(?\DateTime $doneDate): static
    {
        $this->doneDate = $doneDate;

        return $this;
    }

    public function getTaskGroup(): ?Group
    {
        return $this->taskGroup;
    }

    public function setTaskGroup(?Group $taskGroup): static
    {
        $this->taskGroup = $taskGroup;

        return $this;
    }
}
