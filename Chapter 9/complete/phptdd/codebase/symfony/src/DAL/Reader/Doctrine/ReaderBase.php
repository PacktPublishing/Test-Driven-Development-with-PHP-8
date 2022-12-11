<?php

namespace App\DAL\Reader\Doctrine;

use App\Model\ModelInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class ReaderBase
{
    /**
     * @var ManagerRegistry
     */
    private $registry;

    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->setRegistry($doctrine);
        $this->setObjectManager($this->getRegistry()->getManager());
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

    /**
     * @return ObjectManager
     */
    public function getObjectManager(): ObjectManager
    {
        return $this->objectManager;
    }

    /**
     * @param ObjectManager $objectManager
     */
    public function setObjectManager(ObjectManager $objectManager): void
    {
        $this->objectManager = $objectManager;
    }
}