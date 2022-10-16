<?php

namespace App\DAL\Reader\Doctrine;

use App\DAL\Reader\ReaderInterface;
use App\Entity\Color;
use App\Entity\ToyCar;
use App\Model\CarManufacturer;
use App\Model\ToyColor;
use App\Model\ToyCar as ToyCarModel;

class ToyCarReader extends ReaderBase implements ReaderInterface
{
    /**
     * @string
     */
    const ENTITY_NAME = ToyCar::class;

    /**
     * @return array
     */
    public function getAll(): array
    {
        $modelsToReturn = [];

        /** @var Color $doctrineColor */
        $doctrineToyCars  = $this->getObjectManager()->getRepository(self::ENTITY_NAME)->findAll();

        foreach ($doctrineToyCars as $doctrineToyCar) {
            $modelToReturn  = new ToyCarModel();

            // Colour Model
            $colour = new ToyColor();
            $colour->setName($doctrineToyCar->getColor()->getName());
            $colour->setId($doctrineToyCar->getColor()->getId());

            // Manufacturer Model
            $manufacturer = new CarManufacturer();
            $manufacturer->setName($doctrineToyCar->getManufacturer()->getName());
            $manufacturer->setId($doctrineToyCar->getManufacturer()->getId());

            $modelToReturn
                ->setName($doctrineToyCar->getName())
                ->setYear($doctrineToyCar->getYear())
                ->setColour($colour)
                ->setManufacturer($manufacturer)
                ->setId($doctrineToyCar->getId());

            $modelsToReturn[] = $modelToReturn;
        }

        return $modelsToReturn;
    }
}