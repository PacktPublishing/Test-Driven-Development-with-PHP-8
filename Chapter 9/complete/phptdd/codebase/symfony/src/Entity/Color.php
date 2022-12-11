<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'color', targetEntity: ToyCar::class)]
    private Collection $toyCars;

    public function __construct()
    {
        $this->toyCars = new ArrayCollection();
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

    /**
     * @return Collection<int, ToyCar>
     */
    public function getToyCars(): Collection
    {
        return $this->toyCars;
    }

    public function addToyCar(ToyCar $toyCar): self
    {
        if (!$this->toyCars->contains($toyCar)) {
            $this->toyCars->add($toyCar);
            $toyCar->setColor($this);
        }

        return $this;
    }

    public function removeToyCar(ToyCar $toyCar): self
    {
        if ($this->toyCars->removeElement($toyCar)) {
            // set the owning side to null (unless already changed)
            if ($toyCar->getColor() === $this) {
                $toyCar->setColor(null);
            }
        }

        return $this;
    }
}
