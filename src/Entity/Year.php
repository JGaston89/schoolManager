<?php

namespace App\Entity;

use App\Repository\YearRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: YearRepository::class)]
class Year
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $year = null;

    #[ORM\OneToMany(mappedBy: 'year', targetEntity: Asignature::class)]
    private Collection $asignatures;

    public function __construct()
    {
        $this->asignatures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): static
    {
        $this->year = $year;

        return $this;
    }


    public function __toString(){
      return strval($this->getYear());
  }

    /**
     * @return Collection<int, Asignature>
     */
    public function getAsignatures(): Collection
    {
        return $this->asignatures;
    }

    public function addAsignature(Asignature $asignature): static
    {
        if (!$this->asignatures->contains($asignature)) {
            $this->asignatures->add($asignature);
            $asignature->setYear($this);
        }

        return $this;
    }

    public function removeAsignature(Asignature $asignature): static
    {
        if ($this->asignatures->removeElement($asignature)) {
            // set the owning side to null (unless already changed)
            if ($asignature->getYear() === $this) {
                $asignature->setYear(null);
            }
        }

        return $this;
    }
}
