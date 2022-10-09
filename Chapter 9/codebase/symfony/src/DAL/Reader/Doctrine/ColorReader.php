<?php

namespace App\DAL\Reader\Doctrine;

use App\DAL\Reader\ReaderInterface;
use App\Entity\Color;
use App\Model\ToyColor;

class ColorReader extends ReaderBase implements ReaderInterface
{
    /**
     * @string
     */
    const ENTITY_NAME = Color::class;

    /**
     * @return array
     */
    public function getAll(): array
    {
        $modelsToReturn = [];

        /** @var Color $doctrineColor */
        $doctrineColors  = $this->getObjectManager()->getRepository(self::ENTITY_NAME)->findAll();

        foreach ($doctrineColors as $doctrineColor) {
            $modelToReturn  = new ToyColor();
            $modelToReturn
                ->setName($doctrineColor->getName())
                ->setId($doctrineColor->getId());

            $modelsToReturn[$doctrineColor->getName()] = $modelToReturn;
        }

        return $modelsToReturn;
    }
}