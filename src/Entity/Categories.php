<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: Creation::class)]
    private Collection $creations;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: Book::class)]
    private Collection $books;

    public function __construct()
    {
        $this->creations = new ArrayCollection();
        $this->books = new ArrayCollection();
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

    /**
     * @return Collection<int, Creation>
     */
    public function getCreations(): Collection
    {
        return $this->creations;
    }

    public function addCreation(Creation $creation): self
    {
        if (!$this->creations->contains($creation)) {
            $this->creations->add($creation);
            $creation->setCategories($this);
        }

        return $this;
    }

    public function removeCreation(Creation $creation): self
    {
        if ($this->creations->removeElement($creation)) {
            // set the owning side to null (unless already changed)
            if ($creation->getCategories() === $this) {
                $creation->setCategories(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setCategories($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getCategories() === $this) {
                $book->setCategories(null);
            }
        }

        return $this;
    }
}
