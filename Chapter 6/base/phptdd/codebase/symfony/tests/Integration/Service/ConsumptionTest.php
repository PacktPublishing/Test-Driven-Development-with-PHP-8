<?php

namespace App\Tests\Integration\Service;

use App\Entity\Consumption;
use App\Service\ConsumptionService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ConsumptionServiceTest extends KernelTestCase
{
    public function testCanComputeAndSave()
    {
        self::bootKernel();

        // Given
        $name               = "Damo";
        $morningCoffee      = 2;
        $afternoonCoffee    = 3;
        $eveningCoffee      = 1;

        // Expected Total:
        $expectedTotal = 6;

        // Test Step 1: Get the Symfony's service container:
        $container = static::getContainer();

        // Test Step 2: Use PSR-11 standards to get an instance of our service, pre-injected with the EntityManager:
        /** @var ConsumptionService $service */
        $service = $container->get(ConsumptionService::class);

        // Test Step 3: Run the method we want to test for:
        $persistedId = $service->calculateAndSave($name, $morningCoffee, $afternoonCoffee, $eveningCoffee);

        // Test Step 4: Verify if the data persisted data is correct:
        $em             = $service->getManagerRegistry()->getManager();
        $recordFromDb   = $em->find(Consumption::class, $persistedId);

        $this->assertEquals($expectedTotal, $recordFromDb->getTotal());
        $this->assertEquals($name, $recordFromDb->getName());
    }
}