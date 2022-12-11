<?php

namespace App\Validator;

use App\Model\ToyCar;
use App\Model\ValidationModel as ValidationResult;

class ToyCarValidator implements ToyCarValidatorInterface
{
    /**
     * @var array
     */
    private $validators = [];

    /**
     * @param ToyCar $toyCar
     * @return ValidationResult
     */
    public function validate(ToyCar $toyCar): ValidationResult
    {
        $result     = new ValidationResult();
        $allValid   = true;
        $results    = [];

        foreach ($this->getValidators() as $key => $validator) {
            $accessor   = 'get' . ucfirst(strtolower($key));
            $value      = $toyCar->$accessor();
            $isValid    = false;

            try {
                $results[$key]['message'] = '';
                $isValid = $validator->validate($value);
            } catch (ToyCarValidationException $ex) {
                $results[$key]['message']   = $ex->getMessage();
            } finally {
                $results[$key]['is_valid']  = $isValid;
            }

            if (!$isValid) {
                $allValid = false;
            }
        }

        $result->setValid($allValid);
        $result->setReport($results);

        return $result;
    }

    /**
     * @return array
     */
    public function getValidators(): array
    {
        return $this->validators;
    }

    /**
     * @param array $validators
     */
    public function setValidators(array $validators): void
    {
        $this->validators = $validators;
    }
}