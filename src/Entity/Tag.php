<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $colorLight;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $colorMid;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $colorDark;

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

    public function getColorLight(): ?string
    {
        return $this->colorLight;
    }

    public function setColorLight(?string $colorLight): self
    {
        $this->colorLight = $colorLight;

        return $this;
    }

    public function getColorMid(): ?string
    {
        return $this->colorMid;
    }

    public function setColorMid(?string $colorMid): self
    {
        $this->colorMid = $colorMid;

        return $this;
    }

    public function getColorDark(): ?string
    {
        return $this->colorDark;
    }

    public function setColorDark(?string $colorDark): self
    {
        $this->colorDark = $colorDark;

        return $this;
    }
}
