<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $appliedOn;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="jobs")
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=Platform::class, inversedBy="jobs")
     */
    private $platform;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $favourite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgFilename;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getAppliedOn(): ?\DateTimeInterface
    {
        return $this->appliedOn;
    }

    public function setAppliedOn(?\DateTimeInterface $appliedOn): self
    {
        $this->appliedOn = $appliedOn;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getPlatform(): ?Platform
    {
        return $this->platform;
    }

    public function setPlatform(?Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function isFavourite(): ?bool
    {
        return $this->favourite;
    }

    public function setFavourite(?bool $favourite): self
    {
        $this->favourite = $favourite;

        return $this;
    }

    public function getImgFilename(): ?string
    {
        return $this->imgFilename;
    }

    public function setImgFilename(?string $imgFilename): self
    {
        $this->imgFilename = $imgFilename;

        return $this;
    }
}
