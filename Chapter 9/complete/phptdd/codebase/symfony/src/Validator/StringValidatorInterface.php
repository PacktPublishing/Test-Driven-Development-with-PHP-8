<?php

namespace App\Validator;

interface StringValidatorInterface
{
    /**
     * @param string $input
     * @return bool
     */
    public function validateLength(string $input): bool;
}