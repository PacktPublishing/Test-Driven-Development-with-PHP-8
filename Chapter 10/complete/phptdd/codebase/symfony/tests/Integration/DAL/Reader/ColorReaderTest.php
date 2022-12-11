<?php

namespace App\Tests\Integration\DAL\Reader;

use App\DAL\Reader\Doctrine\ColorReader;
use App\Entity\Color;
use App\Model\ToyColor;

class ColorReaderTest extends DataReaderTestBase
{
    public function testCanReadColors()
    {
        $reader = $this->getServiceContainer()->get(ColorReader::class);
        $colorsFromDb = $reader->getAll();

        /** @var Color $color */
        foreach ($colorsFromDb as $color) {
            $this->assertInstanceOf(ToyColor::class, $color);
            $this->assertIsInt($color->getId());
            $this->assertNotNull($color->getName());
        }
    }
}