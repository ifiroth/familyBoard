<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Address::class, mappedBy: 'activities')]
    private Collection $addresses;

    #[ORM\ManyToOne(inversedBy: 'activities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ActivityCategory $category = null;

    #[ORM\OneToMany(mappedBy: 'activity', targetEntity: PlannedActivity::class)]
    private Collection $plannedActivities;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->plannedActivities = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses->add($address);
            $address->addActivity($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            $address->removeActivity($this);
        }

        return $this;
    }

    public function getCategory(): ?ActivityCategory
    {
        return $this->category;
    }

    public function setCategory(?ActivityCategory $category): self
    {
        $this->category = $category;

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
            $plannedActivity->setActivity($this);
        }

        return $this;
    }

    public function removePlannedActivity(PlannedActivity $plannedActivity): self
    {
        if ($this->plannedActivities->removeElement($plannedActivity)) {
            // set the owning side to null (unless already changed)
            if ($plannedActivity->getActivity() === $this) {
                $plannedActivity->setActivity(null);
            }
        }

        return $this;
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
}
