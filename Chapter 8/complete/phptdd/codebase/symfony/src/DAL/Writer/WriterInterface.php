<?php

namespace App\DAL\Writer;

interface WriterInterface
{
    /**
     * @param $model
     * @return bool
     */
    public function write($model): bool;
}