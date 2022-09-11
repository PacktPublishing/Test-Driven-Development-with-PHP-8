<?php

namespace App\Model;

class ToyCar
{
    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var CarManufacturer
     */
    private $manufacturer = '';

    /**
     * @var ToyColor
     */
    private $colour = '';

    /**
     * @var int
     */
    private $year = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return CarManufacturer
     */
    public function getManufacturer(): CarManufacturer
    {
        return $this->manufacturer;
    }

    /**
     * @param CarManufacturer $manufacturer
     */
    public function setManufacturer(CarManufacturer $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return ToyColor
     */
    public function getColour(): ToyColor
    {
        return $this->colour;
    }

    /**
     * @param ToyColor $colour
     */
    public function setColour(ToyColor $colour): void
    {
        $this->colour = $colour;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }
}