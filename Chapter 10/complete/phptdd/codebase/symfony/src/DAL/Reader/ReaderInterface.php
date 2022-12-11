<?php

namespace App\DAL\Reader;

interface ReaderInterface
{
    /**
     * @return array
     */
    public function getAll(): array;
}