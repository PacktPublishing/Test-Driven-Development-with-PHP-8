<?php

namespace App\Tests\Integration\Factory;

use App\Factory\ToyCarValidatorFactory;
use App\Validator\ToyCarValidator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ToyCarValidatorFactoryTest extends KernelTestCase
{
    public function testCanBuildValidator()
    {
        $factory = new ToyCarValidatorFactory();
        $this->assertInstanceOf(ToyCarValidator::class, $factory->build());
    }
}