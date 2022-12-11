<?php

namespace App\Tests\Integration\Repository;

use App\DAL\Writer\WriterInterface;
use App\Model\CarManufacturer;
use App\Model\ToyCar;
use App\Model\ToyColor;
use App\Model\ValidationModel;
use App\Processor\ToyCarCreator;
use App\Validator\ToyCarValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ToyCarCreatorTest extends KernelTestCase
{
    /**
     * @param ToyCar $toyCarModel
     * @throws \App\Validator\ToyCarValidationException
     * @dataProvider provideToyCarModel
     */
    public function testCanCreate(ToyCar $toyCarModel): void
    {
        $validationResultStub = $this->createMock(ValidationModel::class);
        $validationResultStub
            ->method('isValid')
            ->willReturn(true);

        // Mock 1: Validator
        $validatorStub = $this->createMock(ToyCarValidatorInterface::class);
        $validatorStub
            ->method('validate')
            ->willReturn($validationResultStub);

        // Mock 2: Data writer
        $toyWriterStub = $this->createMock(WriterInterface::class);
        $toyWriterStub
            ->method('write')
            ->willReturn(true);

        // Processor Class
        $processor = new ToyCarCreator($validatorStub, $toyWriterStub);

        // Execute
        $result = $processor->create($toyCarModel);

        $this->assertTrue($result);
    }

    public function provideToyCarModel(): array
    {
        // Toy Car Color
        $toyColor = new ToyColor();
        $toyColor->setName('Black');

        // Car Manufacturer
        $carManufacturer = new CarManufacturer();
        $carManufacturer->setName('Ford');

        // Toy Car
        $toyCarModel = new ToyCar();
        $toyCarModel->setName('Mustang');
        $toyCarModel->setColour($toyColor);
        $toyCarModel->setManufacturer($carManufacturer);
        $toyCarModel->setYear(1968);

        return [
            [$toyCarModel],
        ];
    }
}