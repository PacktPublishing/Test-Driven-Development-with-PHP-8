<?php

namespace App\Validator;

class NameValidator implements ValidatorInterface, StringValidatorInterface
{
    const MAX_LENGTH = 10;

    /**
     * @param $input
     * @return bool
     */
    public function validate($input): bool
    {
        $isValid = false;

        if (preg_match("/^([a-zA-Z' ]+)$/", $input)) {
            $isValid = true;
        }

        if ($isValid) {
            $isValid = $this->validateLength($input);
        }

        return $isValid;
    }

    /**
     * @param string $input
     * @return bool
     */
    public function validateLength(string $input): bool
    {
        if (strlen($input) > self::MAX_LENGTH) {
            return false;
        }

        return true;
    }
}