<?php

namespace App\Entity;

use App\Repository\ExtractRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtractRepository::class)]
class Extract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $extract = null;

    #[ORM\ManyToOne(inversedBy: 'extract')]
    private ?Creation $creation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExtract(): ?string
    {
        return $this->extract;
    }

    public function setExtract(?string $extract): self
    {
        $this->extract = $extract;

        return $this;
    }

    public function getCreation(): ?Creation
    {
        return $this->creation;
    }

    public function setCreation(?Creation $creation): self
    {
        $this->creation = $creation;

        return $this;
    }
}
