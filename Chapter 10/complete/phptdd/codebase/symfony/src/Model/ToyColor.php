<?php

namespace App\Model;

class ToyColor implements ModelInterface
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
     * @return ToyColor
     */
    public function setId(int $id): ToyColor
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
     * @return ToyColor
     */
    public function setName(string $name): ToyColor
    {
        $this->name = $name;
        return $this;
    }
}