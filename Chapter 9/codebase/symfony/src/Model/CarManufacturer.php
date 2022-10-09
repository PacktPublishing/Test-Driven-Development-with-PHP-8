<?php

namespace App\Model;

class CarManufacturer implements ModelInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CarManufacturer
     */
    public function setId(int $id): CarManufacturer
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
     * @return CarManufacturer
     */
    public function setName(string $name): CarManufacturer
    {
        $this->name = $name;
        return $this;
    }
}