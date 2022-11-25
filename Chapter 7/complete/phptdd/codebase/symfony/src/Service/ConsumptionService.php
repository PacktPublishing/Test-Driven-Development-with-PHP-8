<?php

namespace App\Service;

use App\Entity\Consumption;
use App\Example\Calculator;
use Doctrine\Persistence\ManagerRegistry;

class ConsumptionService
{
    /**
     * @var Calculator
     */
    private Calculator $calculator;

    /**
     * @var ManagerRegistry
     */
    private $managerRegistry;

    /**
     * @param ManagerRegistry $doctrine
     * @param Calculator $calculator
     */
    public function __construct(ManagerRegistry $doctrine, Calculator $calculator)
    {
        $this->setManagerRegistry($doctrine);
        $this->setCalculator($calculator);
    }

    /**
     * @param string $name
     * @param int $morning
     * @param int $afternoon
     * @param int $evening
     * @return int
     */
    public function calculateAndSave(string $name, int $morning, int $afternoon, int $evening): int
    {
        $entityManager = $this->getManagerRegistry()->getManager();

        // Calculate total:
        $sum = $this->getCalculator()->calculateTotal($morning, $afternoon, $evening);

        // Consumption model or entity:
        $consumption = new Consumption();
        $consumption->setName($name);
        $consumption->setTotal($sum);

        // Persist using the Entity Manager:
        $entityManager->persist($consumption);
        $entityManager->flush();

        return $consumption->getId();
    }

    /**
     * @return Calculator
     */
    public function getCalculator(): Calculator
    {
        return $this->calculator;
    }

    /**
     * @param Calculator $calculator
     */
    public function setCalculator(Calculator $calculator): void
    {
        $this->calculator = $calculator;
    }

    /**
     * @return ManagerRegistry
     */
    public function getManagerRegistry(): ManagerRegistry
    {
        return $this->managerRegistry;
    }

    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function setManagerRegistry(ManagerRegistry $managerRegistry): void
    {
        $this->managerRegistry = $managerRegistry;
    }
}