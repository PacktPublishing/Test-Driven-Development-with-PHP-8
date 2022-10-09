<?php

namespace App\Tests\Integration\DAL\Reader;

use App\DAL\Reader\Doctrine\ToyCarReader;
use App\Model\CarManufacturer;
use App\Model\ToyColor;

class ToyCarReaderTest extends DataReaderTestBase
{
    public function testCanReadToyCars()
    {
        $reader = $this->getServiceContainer()->get(ToyCarReader::class);
        $toyCarsFromDb = $reader->getAll();

        /** @var \App\Model\ToyCar $toyCar */
        foreach ($toyCarsFromDb as $toyCar) {
            $this->assertIsInt($toyCar->getId());
            $this->assertNotNull($toyCar->getName());
            $this->assertNotNull($toyCar->getYear());
            $this->assertInstanceOf(ToyColor::class, $toyCar->getColour());
            $this->assertInstanceOf(CarManufacturer::class, $toyCar->getManufacturer());
        }
    }
}