<?php

namespace App\Tests\Integration\DAL\Reader;

use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DataReaderTestBase extends KernelTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        self::bootKernel();
        parent::setUp();
    }

    /**
     * @return ContainerInterface
     */
    protected function getServiceContainer(): ContainerInterface
    {
        return self::$kernel->getContainer();
    }

    /**
     * @return EntityManager
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function getEm(): EntityManager
    {
        return $this->getServiceContainer()->get('doctrine')->getManager();
    }
}