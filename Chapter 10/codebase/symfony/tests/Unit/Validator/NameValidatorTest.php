<?php

namespace App\Tests\Unit\Validator;

use App\Validator\NameValidator;
use App\Validator\ToyCarValidationException;
use PHPUnit\Framework\TestCase;

class NameValidatorTest extends TestCase
{
    /**
     * @param string $name
     * @dataProvider provideNames
     */
    public function testCanValidate(string $name): void
    {
        $validator  = new NameValidator();
        $isValid    = $validator->validate($name);

        $this->assertTrue($isValid);
    }

    /**
     * @param string $name
     * @dataProvider provideInvalidNames
     */
    public function testCanCatchInvalidNames(string $name): void
    {
        $this->expectException(ToyCarValidationException::class);
        $validator  = new NameValidator();
        $validator->validate($name);
    }

    /**
     * @param string $name
     * @dataProvider provideNames
     */
    public function testValidateLength(string $name): void
    {
        $validator  = new NameValidator();
        $isValid    = $validator->validateLength($name);

        $this->assertTrue($isValid);
    }

    public function provideNames(): array
    {
        return [
            ['Mercedes'],
            ['RedBull'],
            ['Williams'],
            ['MP4-19'],
            ['FW-26'],
        ];
    }

    public function provideInvalidNames(): array
    {
        return [
            ['$9123_@#!(*#Mercedes'],
            ['The Quickbrownfox jumps over the lazy dog.'],
            ['1318581283889301824981'],
            [''],
            ['abc']
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

    public function provideLongNames(): array
    {
        return [
            ['TheQuickBrownFoxJumpsOverTheLazyDog', false],
        ];
    }
}