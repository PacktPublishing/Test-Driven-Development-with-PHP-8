<?php

namespace App\Validator;

class YearValidator implements ValidatorInterface
{
    const MIN_YEAR = 1950;

    /**
     * @param $input
     * @return bool
     */
    public function validate($input): bool
    {
        $isValid = false;

        if (preg_match("/^(\d{4})$/", $input, $matches)) {
            $isValid = true;
        }

        if ($isValid && $input <= self::MIN_YEAR) {
            throw new ToyCarTooOldException('Car is too old.');
        }

        return $isValid;
    }
}