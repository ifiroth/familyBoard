<?php

namespace App\Entity;

use App\Repository\ChildRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChildRepository::class)]
class Child
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: FamilyMember::class, inversedBy: 'children')]
    private Collection $familyMember;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?FamilyMember $parent = null;

    public function __construct()
    {
        $this->familyMember = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, FamilyMember>
     */
    public function getFamilyMember(): Collection
    {
        return $this->familyMember;
    }

    public function addFamilyMember(FamilyMember $familyMember): self
    {
        if (!$this->familyMember->contains($familyMember)) {
            $this->familyMember->add($familyMember);
        }

        return $this;
    }

    public function removeFamilyMember(FamilyMember $familyMember): self
    {
        $this->familyMember->removeElement($familyMember);

        return $this;
    }

    public function getParent(): ?FamilyMember
    {
        return $this->parent;
    }

    public function setParent(FamilyMember $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
