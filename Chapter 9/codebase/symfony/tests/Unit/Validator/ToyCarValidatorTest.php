<?php

namespace App\Tests\Unit\Validator;

use App\Model\CarManufacturer;
use App\Model\ToyCar;
use App\Model\ToyColor;
use App\Validator\NameValidator;
use App\Validator\ToyCarValidator;
use App\Validator\YearValidator;
use PHPUnit\Framework\TestCase;

class ToyCarValidatorTest extends TestCase
{
    /**
     * @param ToyCar $toyCar
     * @param array $expected
     * @dataProvider provideToyCarModel
     */
    public function testCanValidate(ToyCar $toyCar, array $expected): void
    {
        $validators = [
            'year'  => new YearValidator(),
            'name'  => new NameValidator(),
        ];

        // Inject the validators
        $validator = new ToyCarValidator();
        $validator->setValidators($validators);

        $result = $validator->validate($toyCar);

        $this->assertEquals($expected['is_valid'], $result->isValid());
        $this->assertEquals($expected['name'], $result->getReport()['name']['is_valid']);
        $this->assertEquals($expected['year'], $result->getReport()['year']['is_valid']);
    }

    public function provideToyCarModel(): array
    {
        // Toy Car Color
        $toyColor = new ToyColor();
        $toyColor->setName('White');

        // Car Manufacturer
        $carManufacturer = new CarManufacturer();
        $carManufacturer->setName('Williams');

        // Toy Car
        $toyCarModel = new ToyCar();
        $toyCarModel->setName(''); // Should fail.
        $toyCarModel->setColour($toyColor);
        $toyCarModel->setManufacturer($carManufacturer);
        $toyCarModel->setYear(1935);

        return [
            [$toyCarModel, ['is_valid' => false, 'name' => false, 'year' => false]],
        ];
    }
}