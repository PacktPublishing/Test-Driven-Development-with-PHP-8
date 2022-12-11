<?php

namespace App\Validator;

interface ValidatorInterface
{
    /**
     * @param $input
     * @return bool
     * @throws ToyCarValidationException
     */
    public function validate($input): bool;
}