<?php

namespace App\Tests\Unit\Validator;

use App\Validator\NameValidator;
use PHPUnit\Framework\TestCase;

class NameValidatorTest extends TestCase
{
    /**
     * @param $data
     * @param $expected
     * @dataProvider provideNames
     */
    public function testCanValidateName(string $name, bool $expected): void
    {
        $validator  = new NameValidator();
        $isValid    = $validator->validate($name);

        $this->assertEquals($expected, $isValid);
    }

    /**
     * @return array
     */
    public function provideNames(): array
    {
        return [
            ['',            false],
            ['$50',         false],
            ['Mercedes',    true],
            ['RedBull',     true],
            ['Williams',    true],
        ];
    }

    /**
     * @param $data
     * @param $expected
     * @dataProvider provideLongNames
     */
    public function testCanValidateNameLength(string $name, bool $expected): void
    {
        $validator  = new NameValidator();
        $isValid    = $validator->validateLength($name);

        $this->assertEquals($expected, $isValid);
    }

    /**
     * @return array
     */
    public function provideLongNames(): array
    {
        return [
            ['TheQuickBrownFoxJumpsOverTheLazyDog', false],
        ];
    }
}