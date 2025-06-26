<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column]
    private ?bool $valide = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    /**
     * @var Collection<int, Lunette>
     */
    #[ORM\ManyToMany(targetEntity: Lunette::class, inversedBy: 'commandes')]
    private Collection $lunettes;

    public function __construct()
    {
        $this->lunettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function isValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(bool $valide): static
    {
        $this->valide = $valide;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Lunette>
     */
    public function getLunettes(): Collection
    {
        return $this->lunettes;
    }

    public function addLunette(Lunette $lunette): static
    {
        if (!$this->lunettes->contains($lunette)) {
            $this->lunettes->add($lunette);
        }

        return $this;
    }

    public function removeLunette(Lunette $lunette): static
    {
        $this->lunettes->removeElement($lunette);

        return $this;
    }
}
