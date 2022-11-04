<?php

namespace App\Entity;

use App\Repository\FamilyMemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilyMemberRepository::class)]
class FamilyMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\ManyToOne(inversedBy: 'familyMember')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $address = null;

    #[ORM\ManyToMany(targetEntity: Child::class, mappedBy: 'familyMember')]
    private Collection $children;

    #[ORM\ManyToMany(targetEntity: PlannedActivity::class, mappedBy: 'familyMembers')]
    private Collection $plannedActivities;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->plannedActivities = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->firstname;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, Child>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Child $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children->add($child);
            $child->addFamilyMember($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->children->removeElement($child)) {
            $child->removeFamilyMember($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, PlannedActivity>
     */
    public function getPlannedActivities(): Collection
    {
        return $this->plannedActivities;
    }

    public function addPlannedActivity(PlannedActivity $plannedActivity): self
    {
        if (!$this->plannedActivities->contains($plannedActivity)) {
            $this->plannedActivities->add($plannedActivity);
            $plannedActivity->addFamilyMember($this);
        }

        return $this;
    }

    public function removePlannedActivity(PlannedActivity $plannedActivity): self
    {
        if ($this->plannedActivities->removeElement($plannedActivity)) {
            $plannedActivity->removeFamilyMember($this);
        }

        return $this;
    }
}
