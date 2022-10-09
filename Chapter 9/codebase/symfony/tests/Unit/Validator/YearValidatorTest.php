<?php

namespace App\Tests\Unit\Validator;

use App\Validator\ToyCarTooOldException;
use App\Validator\ToyCarValidationException;
use PHPUnit\Framework\TestCase;
use App\Validator\YearValidator;

class YearValidatorTest extends TestCase
{
    /**
     * @param int $year
     * @throws ToyCarTooOldException
     * @throws ToyCarValidationException
     * @dataProvider provideValidYears
     */
    public function testCanValidateYear(int $year): void
    {
        $validator  = new YearValidator();
        $isValid    = $validator->validate($year);

        $this->assertTrue($isValid);
    }

    /**
     * @return array
     */
    public function provideValidYears(): array
    {
        return [
            [2005,  true],
            [1955,  true],
            [2003,  true],
            [2022,  true],
        ];
    }

    /**
     * @param int $year
     * @dataProvider provideInvalidYears
     */
    public function testCanValidateInvalidYear(int $year): void
    {
        $this->expectException(ToyCarValidationException::class);
        $validator  = new YearValidator();
        $validator->validate($year);
    }

    /**
     * @return array
     */
    public function provideInvalidYears(): array
    {
        return [
            [1,    ],
            [312,  ],
            [9999,  ],
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