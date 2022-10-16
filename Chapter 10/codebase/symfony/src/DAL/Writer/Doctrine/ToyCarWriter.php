<?php

namespace App\DAL\Writer\Doctrine;

use App\DAL\Writer\WriterException;
use App\DAL\Writer\WriterInterface;
use App\Entity\Color;
use App\Entity\Manufacturer;
use App\Entity\ToyCar;
use App\Model\ModelInterface;
use Doctrine\Persistence\ManagerRegistry;

class ToyCarWriter implements WriterInterface
{
    /**
     * @var ManagerRegistry
     */
    private $registry;

    /**
     * @var int
     */
    private $id;

    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->setRegistry($doctrine);
    }

    /**
     * @param ModelInterface $toyCar
     * @return bool
     */
    public function write(ModelInterface $toyCar): bool
    {
        $manager = $this->getRegistry()->getManager();

        // The $toyCar is an App\Model\ModelInterface instance.
        // We need to hydrate the Doctrine Entity.
        $doctrineToyCarEntity = new ToyCar();
        $doctrineToyCarEntity->setName($toyCar->getName());

        // Doctrine Entity: Manufacturer
        $manufacturer = $manager
            ->getRepository(Manufacturer::class)
            ->findOneBy(['id' => $toyCar->getManufacturer()->getId()]);

        // Doctrine Entity: Color
        $color = $manager
            ->getRepository(Color::class)
            ->findOneBy(['id' => $toyCar->getColour()->getId()]);

        $doctrineToyCarEntity->setManufacturer($manufacturer);
        $doctrineToyCarEntity->setColor($color);
        $doctrineToyCarEntity->setYear($toyCar->getYear());

        $manager->persist($doctrineToyCarEntity);
        $manager->flush();
        $this->setId($doctrineToyCarEntity->getId());

        return true;
    }

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
    private function setId(int $id)
    {
        $this->id = $id;
    }


    /**
     * @return ManagerRegistry
     */
    public function getRegistry(): ManagerRegistry
    {
        return $this->registry;
    }

    /**
     * @param ManagerRegistry $registry
     */
    public function setRegistry(ManagerRegistry $registry): void
    {
        $this->registry = $registry;
    }
}