<?php

namespace App\Tests\Integration\DAL\Reader;

use App\DAL\Reader\Doctrine\ManufacturerReader;
use App\Entity\Manufacturer;
use App\Model\CarManufacturer;

class ManufacturerReaderTest extends DataReaderTestBase
{
    public function testCanReadManufacturers()
    {
        $reader = $this->getServiceContainer()->get(ManufacturerReader::class);
        $manufacturersFromDb = $reader->getAll();

        /** @var Manufacturer $manufacturer */
        foreach ($manufacturersFromDb as $manufacturer) {
            $this->assertInstanceOf(CarManufacturer::class, $manufacturer);
            $this->assertIsInt($manufacturer->getId());
            $this->assertNotNull($manufacturer->getName());
        }
    }
}