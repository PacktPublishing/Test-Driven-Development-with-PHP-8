<?php

namespace App\Processor;

use App\DAL\Writer\Doctrine\ToyCarWriter;
use App\DAL\Writer\WriterInterface;
use App\Model\ToyCar;
use App\Validator\ToyCarValidationException;
use App\Validator\ToyCarValidator;
use App\Validator\ToyCarValidatorInterface;

class ToyCarCreator
{
    /**
     * @var ToyCarValidatorInterface
     */
    private $validator;

    /**
     * @var WriterInterface
     */
    private $dataWriter;

    /**
     * @param ToyCarValidatorInterface $validator
     * @param ToyCarWriter $dataWriter
     */
    public function __construct(ToyCarValidator $validator, ToyCarWriter $dataWriter)
    {
        $this->setValidator($validator);
        $this->setDataWriter($dataWriter);
    }

    /**
     * @param ToyCar $toyCar
     * @return bool
     * @throws ToyCarValidationException
     */
    public function create(ToyCar $toyCar): bool
    {
        // Do some validation here and so on...
        $validationResults = $this->getValidator()->validate($toyCar);

        if (!$validationResults->isValid()) {
            throw new ToyCarValidationException(json_encode($validationResults));
        }

        // Write the data
        $result = $this->getDataWriter()->write($toyCar);

        // Do other stuff.

        return $result;
    }

    /**
     * @return WriterInterface
     */
    public function getDataWriter(): WriterInterface
    {
        return $this->dataWriter;
    }

    /**
     * @param WriterInterface $dataWriter
     */
    public function setDataWriter(WriterInterface $dataWriter): void
    {
        $this->dataWriter = $dataWriter;
    }

    /**
     * @return ToyCarValidatorInterface
     */
    public function getValidator(): ToyCarValidatorInterface
    {
        return $this->validator;
    }

    /**
     * @param ToyCarValidatorInterface $validator
     */
    public function setValidator(ToyCarValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }
}