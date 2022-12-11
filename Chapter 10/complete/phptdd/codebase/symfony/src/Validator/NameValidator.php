<?php

namespace App\Validator;

class NameValidator implements ValidatorInterface
{
    const MIN_LENGTH = 4;
    const MAX_LENGTH = 10;

    /**
     * @param $input
     * @return bool
     */
    public function validate($input): bool
    {
        if (!$input) {
            throw new ToyCarValidationException('Invalid name.');
        }

        if (preg_match('/[^a-z_\-0-9]/i', $input)) {
            throw new ToyCarValidationException('Invalid name characters detected.');
        }

        if (!$this->validateLength($input)) {
            throw new ToyCarValidationException('Invalid name length.');
        }

        return true;
    }

    /**
     * @param string $input
     * @return bool
     */
    public function validateLength(string $input): bool
    {
        $len = strlen($input);

        if ($len > self::MAX_LENGTH) {
            return false;
        }

        if ($len < self::MIN_LENGTH) {
            return false;
        }

        return true;
    }
}