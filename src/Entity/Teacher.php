<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $dni = null;

    #[ORM\ManyToMany(targetEntity: Asignature::class, inversedBy: 'teachers')]
    private Collection $asignature;

    public function __construct()
    {
        $this->asignature = new ArrayCollection();
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): static
    {
        $this->dni = $dni;

        return $this;
    }

    public function __toString(){
      return strval($this->getName());
  }

    /**
     * @return Collection<int, Asignature>
     */
    public function getAsignature(): Collection
    {
        return $this->asignature;
    }

    public function addAsignature(Asignature $asignature): static
    {
        if (!$this->asignature->contains($asignature)) {
            $this->asignature->add($asignature);
        }

        return $this;
    }

    public function removeAsignature(Asignature $asignature): static
    {
        $this->asignature->removeElement($asignature);

        return $this;
    }


}
