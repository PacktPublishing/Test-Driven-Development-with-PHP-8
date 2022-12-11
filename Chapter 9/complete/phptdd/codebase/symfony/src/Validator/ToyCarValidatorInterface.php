<?php

namespace App\Validator;

use App\Model\ToyCar;
use App\Model\ValidationModel;

interface ToyCarValidatorInterface
{
    /**
     * @param ToyCar $toyCar
     * @return ValidationModel
     */
    public function validate(ToyCar $toyCar): ValidationModel;
}