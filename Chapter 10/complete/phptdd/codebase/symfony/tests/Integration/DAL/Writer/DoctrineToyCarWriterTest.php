<?php

namespace App\Tests\Integration\DAL\Writer;

use App\DAL\Writer\Doctrine\ToyCarWriter;
use App\Model\CarManufacturer;
use App\Model\ModelInterface;
use App\Model\ToyCar;
use App\Model\ToyColor;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DoctrineToyCarWriterTest extends KernelTestCase
{
    /**
     * @param ModelInterface $toyCarModel
     * @param bool $expected
     * @throws \App\DAL\Writer\WriterException
     * @dataProvider provideCreateTestData
     */
    public function testCanCreateToyCarRecord(ModelInterface $toyCarModel, bool $expected): void
    {
        $container  = self::getContainer();
        $writer     = $container->get(ToyCarWriter::class);
        $result     = $writer->write($toyCarModel);

        $this->assertEquals($expected, $result);
        $this->assertIsInt($writer->getId());
    }

    /**
     * @return array[]
     */
    public function provideCreateTestData(): array
    {
        $toyCar1 = new ToyCar();
        $toyCar1->setName("FW26");

        $m1 = new CarManufacturer();
        $m1->setId(1);
        $c1 = new ToyColor();
        $c1->setId(2);

        $toyCar1->setManufacturer($m1);
        $toyCar1->setColour($c1);
        $toyCar1->setYear(2004);

        return [
            [$toyCar1, true],
        ];
    }
}