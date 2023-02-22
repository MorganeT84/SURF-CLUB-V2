<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dayTime = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dayTimeEnd = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column]
    private ?int $numberOfPlace = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Level::class, inversedBy: 'sessions')]
    private Collection $level;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    private ?Spot $spot = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    private ?Category $category = null;

    public function __construct()
    {
        $this->level = new ArrayCollection();

        // adding a new date for each new object, corresponding to the flush date
        $this->createdAt = new DateTimeImmutable();
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDayTime(): ?\DateTimeImmutable
    {
        return $this->dayTime;
    }

    public function setDayTime(\DateTimeImmutable $dayTime): self
    {
        $this->dayTime = $dayTime;

        return $this;
    }

    public function getDayTimeEnd(): ?\DateTimeImmutable
    {
        return $this->dayTimeEnd;
    }

    public function setDayTimeEnd(?\DateTimeImmutable $dayTimeEnd): self
    {
        $this->dayTimeEnd = $dayTimeEnd;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getNumberOfPlace(): ?int
    {
        return $this->numberOfPlace;
    }

    public function setNumberOfPlace(int $numberOfPlace): self
    {
        $this->numberOfPlace = $numberOfPlace;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Level>
     */
    public function getLevel(): Collection
    {
        return $this->level;
    }

    public function addLevel(Level $level): self
    {
        if (!$this->level->contains($level)) {
            $this->level->add($level);
        }

        return $this;
    }

    public function removeLevel(Level $level): self
    {
        $this->level->removeElement($level);

        return $this;
    }

    public function getSpot(): ?Spot
    {
        return $this->spot;
    }

    public function setSpot(?Spot $spot): self
    {
        $this->spot = $spot;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
