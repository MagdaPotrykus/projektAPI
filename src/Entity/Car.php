<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $engineCapacity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productionYear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enginePower;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vinNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mileage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getEngineCapacity(): ?string
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(string $engineCapacity): self
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    public function getProductionYear(): ?string
    {
        return $this->productionYear;
    }

    public function setProductionYear(string $productionYear): self
    {
        $this->productionYear = $productionYear;

        return $this;
    }

    public function getEnginePower(): ?string
    {
        return $this->enginePower;
    }

    public function setEnginePower(string $enginePower): self
    {
        $this->enginePower = $enginePower;

        return $this;
    }

    public function getVinNumber(): ?string
    {
        return $this->vinNumber;
    }

    public function setVinNumber(string $vinNumber): self
    {
        $this->vinNumber = $vinNumber;

        return $this;
    }

    public function getMileage(): ?string
    {
        return $this->mileage;
    }

    public function setMileage(string $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }
}
