<?php

namespace App\Example;

class Calculator
{
    public function calculateTotal(int $a, int $b, int $c) : int
    {
        return $a + $b + $c;
    }

    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function subtract(int $a, int $b): int
    {
        return $this->getDifference($a, $b);
    }

    private function getDifference(int $a, int $b): int
    {
        return $a - $b;
    }
}