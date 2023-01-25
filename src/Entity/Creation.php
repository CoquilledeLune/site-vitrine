<?php

namespace App\Entity;

use App\Repository\CreationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreationRepository::class)]
class  Creation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $size = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'creation', targetEntity: Link::class)]
    private Collection $link;

    #[ORM\OneToMany(mappedBy: 'creation', targetEntity: Extract::class)]
    private Collection $extract;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    public function __construct()
    {
        $this->link = new ArrayCollection();
        $this->extract = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Link>
     */
    public function getLink(): Collection
    {
        return $this->link;
    }

    public function addLink(Link $link): self
    {
        if (!$this->link->contains($link)) {
            $this->link->add($link);
            $link->setCreation($this);
        }

        return $this;
    }

    public function removeLink(Link $link): self
    {
        if ($this->link->removeElement($link)) {
            // set the owning side to null (unless already changed)
            if ($link->getCreation() === $this) {
                $link->setCreation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Extract>
     */
    public function getExtract(): Collection
    {
        return $this->extract;
    }

    public function addExtract(Extract $extract): self
    {
        if (!$this->extract->contains($extract)) {
            $this->extract->add($extract);
            $extract->setCreation($this);
        }

        return $this;
    }

    public function removeExtract(Extract $extract): self
    {
        if ($this->extract->removeElement($extract)) {
            // set the owning side to null (unless already changed)
            if ($extract->getCreation() === $this) {
                $extract->setCreation(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }
}
