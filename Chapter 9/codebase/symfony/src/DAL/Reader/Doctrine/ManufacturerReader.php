<?php

namespace App\DAL\Reader\Doctrine;

use App\DAL\Reader\ReaderInterface;
use App\Entity\Color;
use App\Entity\Manufacturer;
use App\Model\CarManufacturer;

class ManufacturerReader extends ReaderBase implements ReaderInterface
{
    /**
     * @string
     */
    const ENTITY_NAME = Manufacturer::class;

    /**
     * @return array
     */
    public function getAll(): array
    {
        $modelsToReturn = [];

        /** @var Color $doctrineColor */
        $doctrineManufacturers  = $this->getObjectManager()->getRepository(self::ENTITY_NAME)->findAll();

        foreach ($doctrineManufacturers as $doctrineManufacturer) {
            $modelToReturn  = new CarManufacturer();
            $modelToReturn
                ->setName($doctrineManufacturer->getName())
                ->setId($doctrineManufacturer->getId());

            $modelsToReturn[$doctrineManufacturer->getName()] = $modelToReturn;
        }

        return $modelsToReturn;
    }
}