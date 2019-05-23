<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoutineRepository")
 */
class Routine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Level", inversedBy="routine")
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Exercise", mappedBy="routine")
     */
    private $exercises;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Challenges", mappedBy="routines")
     */
    private $challenges;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="routines")
     */
    private $userfav;

    public function __construct()
    {
        $this->exercises = new ArrayCollection();
        $this->challenges = new ArrayCollection();
        $this->userfav = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
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

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): self
    {
        $this->level = $level;

        return $this;
    }



    /**
     * @return Collection|Challenges[]
     */
    public function getChallenges(): Collection
    {
        return $this->challenges;
    }

    public function addChallenge(Challenges $challenge): self
    {
        if (!$this->challenges->contains($challenge)) {
            $this->challenges[] = $challenge;
            $challenge->addRoutine($this);
        }

        return $this;
    }

    public function removeChallenge(Challenges $challenge): self
    {
        if ($this->challenges->contains($challenge)) {
            $this->challenges->removeElement($challenge);
            $challenge->removeRoutine($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserfav(): Collection
    {
        return $this->userfav;
    }

    public function addUserfav(User $userfav): self
    {
        if (!$this->userfav->contains($userfav)) {
            $this->userfav[] = $userfav;
            $userfav->addRoutine($this);
        }

        return $this;
    }

    public function removeUserfav(User $userfav): self
    {
        if ($this->userfav->contains($userfav)) {
            $this->userfav->removeElement($userfav);
            $userfav->removeRoutine($this);
        }

        return $this;
    }
}
