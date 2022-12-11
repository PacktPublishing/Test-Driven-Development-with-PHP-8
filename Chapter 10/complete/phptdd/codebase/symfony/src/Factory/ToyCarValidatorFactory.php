<?php

namespace App\Factory;

use App\Validator\NameValidator;
use App\Validator\ToyCarValidator;
use App\Validator\YearValidator;

class ToyCarValidatorFactory
{
    /**
     * @return ToyCarValidator
     */
    public static function build(): ToyCarValidator
    {
        // You can use the custom DI Container instead as well.

        $validators = [
            'year'  => new YearValidator(),
            'name'  => new NameValidator(),
        ];

        // Inject the validators
        $validator = new ToyCarValidator();
        $validator->setValidators($validators);

        return $validator;
    }
}