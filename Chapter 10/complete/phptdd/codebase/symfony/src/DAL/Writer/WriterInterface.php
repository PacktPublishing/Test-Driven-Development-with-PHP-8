<?php

namespace App\DAL\Writer;

use App\Model\ModelInterface;

interface WriterInterface
{
    /**
     * @param ModelInterface $model
     * @return bool
     * @throws WriterException
     */
    public function write(ModelInterface $model): bool;

    /**
     * @return int
     */
    public function getId(): int;
}