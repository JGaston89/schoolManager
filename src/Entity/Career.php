<?php

namespace App\Entity;

use App\Repository\CareerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CareerRepository::class)]
class Career
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'career', targetEntity: Student::class)]
    private Collection $student;

    #[ORM\OneToMany(mappedBy: 'career', targetEntity: Asignature::class)]
    private Collection $asignature;

    public function __construct()
    {
        $this->student = new ArrayCollection();
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

    /**
     * @return Collection<int, Student>
     */
    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function addStudent(Student $student): static
    {
        if (!$this->student->contains($student)) {
            $this->student->add($student);
            $student->setCareer($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): static
    {
        if ($this->student->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getCareer() === $this) {
                $student->setCareer(null);
            }
        }

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
            $asignature->setCareer($this);
        }

        return $this;
    }

    public function removeAsignature(Asignature $asignature): static
    {
        if ($this->asignature->removeElement($asignature)) {
            // set the owning side to null (unless already changed)
            if ($asignature->getCareer() === $this) {
                $asignature->setCareer(null);
            }
        }

        return $this;
    }
}
