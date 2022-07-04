<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $photoflag;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    private $capitalcity;

    #[ORM\Column(type: 'datetime_immutable')]
    private $uploaded_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoflag(): ?string
    {
        return $this->photoflag;
    }

    public function setPhotoflag(string $photoflag): self
    {
        $this->photoflag = $photoflag;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCapitalcity(): ?string
    {
        return $this->capitalcity;
    }

    public function setCapitalcity(string $capitalcity): self
    {
        $this->capitalcity = $capitalcity;

        return $this;
    }

    public function getUploadedAt(): ?\DateTimeImmutable
    {
        return $this->uploaded_at;
    }

    public function setUploadedAt(\DateTimeImmutable $uploaded_at): self
    {
        $this->uploaded_at = $uploaded_at;

        return $this;
    }
}
