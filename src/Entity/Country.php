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
    private ?string $photoflag;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    private $capitalcity;

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

    public function getCountryUrl(): ?string
    {
        if (!$this->photoflag) {
            return null;
        }
        if (str_contains($this->photoflag, '/')) {
            return $this->photoflag;
        }
        return sprintf('/uploads/photoflag/%s', $this->photoflag);
    }
}
