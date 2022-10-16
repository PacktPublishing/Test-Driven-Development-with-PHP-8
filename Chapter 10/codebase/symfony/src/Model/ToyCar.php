<?php

namespace App\Model;

use function Webmozart\Assert\Tests\StaticAnalysis\null;

class ToyCar implements ModelInterface
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
    private $manufacturer;

    /**
     * @var ToyColor
     */
    private $colour;

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
     * @return ToyCar
     */
    public function setId(int $id): ToyCar
    {
        $this->id = $id;
        return $this;
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
     * @return ToyCar
     */
    public function setName(string $name): ToyCar
    {
        $this->name = $name;
        return $this;
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
     * @return ToyCar
     */
    public function setManufacturer(CarManufacturer $manufacturer): ToyCar
    {
        $this->manufacturer = $manufacturer;
        return $this;
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
     * @return ToyCar
     */
    public function setColour(ToyColor $colour): ToyCar
    {
        $this->colour = $colour;
        return $this;
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
     * @return ToyCar
     */
    public function setYear(int $year): ToyCar
    {
        $this->year = $year;
        return $this;
    }
}