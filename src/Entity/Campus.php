<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampusRepository::class)
 */
class Campus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRemote;

    /**
     * @ORM\ManyToMany(targetEntity=Curriculum::class, mappedBy="campuses")
     */
    private $curricula;

    /**
     * @ORM\OneToMany(targetEntity=Instructor::class, mappedBy="campus")
     */
    private $instructors;

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="camus")
     */
    private $students;

    public function __construct()
    {
        $this->curricula = new ArrayCollection();
        $this->instructors = new ArrayCollection();
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getIsRemote(): ?bool
    {
        return $this->isRemote;
    }

    public function setIsRemote(bool $isRemote): self
    {
        $this->isRemote = $isRemote;

        return $this;
    }

    /**
     * @return Collection|Curriculum[]
     */
    public function getCurricula(): Collection
    {
        return $this->curricula;
    }

    public function addCurriculum(Curriculum $curriculum): self
    {
        if (!$this->curricula->contains($curriculum)) {
            $this->curricula[] = $curriculum;
            $curriculum->addCampus($this);
        }

        return $this;
    }

    public function removeCurriculum(Curriculum $curriculum): self
    {
        if ($this->curricula->removeElement($curriculum)) {
            $curriculum->removeCampus($this);
        }

        return $this;
    }

    /**
     * @return Collection|Instructor[]
     */
    public function getInstructors(): Collection
    {
        return $this->instructors;
    }

    public function addInstructor(Instructor $instructor): self
    {
        if (!$this->instructors->contains($instructor)) {
            $this->instructors[] = $instructor;
            $instructor->setCampus($this);
        }

        return $this;
    }

    public function removeInstructor(Instructor $instructor): self
    {
        if ($this->instructors->removeElement($instructor)) {
            // set the owning side to null (unless already changed)
            if ($instructor->getCampus() === $this) {
                $instructor->setCampus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setCamus($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getCamus() === $this) {
                $student->setCamus(null);
            }
        }

        return $this;
    }
}
