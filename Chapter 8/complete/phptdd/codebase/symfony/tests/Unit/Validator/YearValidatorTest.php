<?php

namespace App\Tests\Unit\Validator;

use App\Validator\ToyCarTooOldException;
use PHPUnit\Framework\TestCase;
use App\Validator\YearValidator;

class YearValidatorTest extends TestCase
{
    /**
     * @param $data
     * @param $expected
     * @dataProvider provideYear
     */
    public function testCanValidateYear(int $year, bool $expected): void
    {
        $validator  = new YearValidator();
        $isValid    = $validator->validate($year);

        $this->assertEquals($expected, $isValid);
    }

    /**
     * @return array
     */
    public function provideYear(): array
    {
        return [
            [1,     false],
            [2005,  true],
            [1955,  true],
            [312,   false],
        ];
    }

    /**
     * @param int $year
     * @dataProvider provideOldYears
     */
    public function testCanRejectVeryOldCar(int $year): void
    {
        $this->expectException(ToyCarTooOldException::class);
        $validator  = new YearValidator();
        $validator->validate($year);

    }

    /**
     * @return array
     */
    public function provideOldYears(): array
    {
        return [
            [1944],
            [1933],
            [1922],
            [1911],
        ];
    }

}