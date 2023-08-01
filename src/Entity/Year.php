<?php

namespace App\Entity;

use App\Repository\YearRepository;
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

    #[ORM\OneToOne(mappedBy: 'year', cascade: ['persist', 'remove'])]
    private ?Asignature $asignature = null;

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

    public function getAsignature(): ?Asignature
    {
        return $this->asignature;
    }

    public function setAsignature(?Asignature $asignature): static
    {
        // unset the owning side of the relation if necessary
        if ($asignature === null && $this->asignature !== null) {
            $this->asignature->setYear(null);
        }

        // set the owning side of the relation if necessary
        if ($asignature !== null && $asignature->getYear() !== $this) {
            $asignature->setYear($this);
        }

        $this->asignature = $asignature;

        return $this;
    }

    public function __toString(){
      return strval($this->getYear());
  }
}
