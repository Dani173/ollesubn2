<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExerciseRepository")
 */
class Exercise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $series;

    /**
     * @ORM\Column(type="integer")
     */
    private $repetitions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $multimedia;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Routine", inversedBy="exercises")
     */
    private $routine;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Musclegroups", mappedBy="exercise")
     */
    private $musclegroup;

    public function __construct()
    {
        $this->routine = new ArrayCollection();
        $this->musclegroup = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSeries(): ?int
    {
        return $this->series;
    }

    public function setSeries(int $series): self
    {
        $this->series = $series;

        return $this;
    }

    public function getRepetitions(): ?int
    {
        return $this->repetitions;
    }

    public function setRepetitions(int $repetitions): self
    {
        $this->repetitions = $repetitions;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getMultimedia(): ?string
    {
        return $this->multimedia;
    }

    public function setMultimedia(string $multimedia): self
    {
        $this->multimedia = $multimedia;

        return $this;
    }

    /**
     * @return Collection|Routine[]
     */
    public function getRoutine(): Collection
    {
        return $this->routine;
    }

    public function addRoutine(Routine $routine): self
    {
        if (!$this->routine->contains($routine)) {
            $this->routine[] = $routine;
        }

        return $this;
    }

    public function removeRoutine(Routine $routine): self
    {
        if ($this->routine->contains($routine)) {
            $this->routine->removeElement($routine);
        }

        return $this;
    }

    /**
     * @return Collection|Musclegroups[]
     */
    public function getMusclegroup(): Collection
    {
        return $this->musclegroup;
    }

    public function addMusclegroup(Musclegroups $musclegroup): self
    {
        if (!$this->musclegroup->contains($musclegroup)) {
            $this->musclegroup[] = $musclegroup;
            $musclegroup->addExercise($this);
        }

        return $this;
    }

    public function removeMusclegroup(Musclegroups $musclegroup): self
    {
        if ($this->musclegroup->contains($musclegroup)) {
            $this->musclegroup->removeElement($musclegroup);
            $musclegroup->removeExercise($this);
        }

        return $this;
    }
}
