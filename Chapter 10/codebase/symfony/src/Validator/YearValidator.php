<?php

namespace App\Validator;

class YearValidator implements ValidatorInterface
{
    const MIN_YEAR = 1950;
    const MAX_YEAR = 2030;

    /**
     * @param $input
     * @return bool
     * @throws ToyCarTooOldException
     * @throws ToyCarValidationException
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

        if ($isValid && $input >= self::MAX_YEAR) {
            throw new ToyCarValidationException('Year invalid.');
        }

        if (!$isValid) {
            throw new ToyCarValidationException('Invalid value.');
        }

        return $isValid;
    }
}