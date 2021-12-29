<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registrationNumber;

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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service;

    /**
     * @ORM\Column(type="datetime")
     */
    private $reservationDate;

    // public function __toString(): string
    // {
    //     return $this->brand.' '.$this->reservationDate;
    // }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): self
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
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

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getReservationDate(): ?\DateTimeInterface
    {
        return $this->reservationDate;
    }

    public function setReservationDate(\DateTimeInterface $reservationDate): self
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {

        $metadata->addPropertyConstraint('firstname', new Assert\Length([
            'min' => 3,
            'max' => 20,
            'minMessage' => 'Twoje imię musi zawierać minimum {{ limit }} znaki',
            'maxMessage' => 'Twoje imię nie może być dłuższe niż {{ limit }} znaków',
        ]));

        $metadata->addPropertyConstraint('lastname', new Assert\Length([
            'min' => 3,
            'max' => 60,
            'minMessage' => 'Twoje nazwisko musi zawierać minimum {{ limit }} znaki',
            'maxMessage' => 'Twoje nazwisko nie może być dłuższe niż {{ limit }} znaków',
        ]));

        $metadata->addPropertyConstraint('productionYear', new Assert\Range([
            'min' => 1950,
            'max' => 2025,
            'notInRangeMessage' => 'Rok produkcji musi być w zakresie {{ min }} -  {{ max }}',
        ]));

        $metadata->addPropertyConstraint('mileage', new Assert\Positive([
            'message'=>'Przebieg samochodu musi być większy od 0']));

        $metadata->addPropertyConstraint('reservationDate', new Assert\Range([
            'min' => 'now',
            'max' => '+365 days',
            'notInRangeMessage'=>'Podana data jest nieprawidłowa']));  
    }
}
