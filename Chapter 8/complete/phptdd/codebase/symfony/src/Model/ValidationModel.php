<?php

namespace App\Model;

class ValidationModel
{
    /**
     * @var bool
     */
    private $valid = false;

    /**
     * @var array
     */
    private $report = [];

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }

    /**
     * @return array
     */
    public function getReport(): array
    {
        return $this->report;
    }

    /**
     * @param array $report
     */
    public function setReport(array $report): void
    {
        $this->report = $report;
    }
}