<?php

namespace App\Tests\Unit;

use App\Example\Calculator;
use PHPUnit\Framework\TestCase;

class CalculationTest extends TestCase
{
    /**
     * @covers \App\Example\Calculator::calculateTotal
     */
    public function testCanCalculateTotal()
    {
        // Expected result:
        $expectedTotal = 6;

        // Test data:
        $a = 1;
        $b = 2;
        $c = 3;

        $calculator = new Calculator();
        $total      = $calculator->calculateTotal($a, $b, $c);

        $this->assertEquals($expectedTotal, $total);
    }

    /**
     * @covers \App\Example\Calculator::add
     */
    public function testCanAddIntegers()
    {
        // Expected Result
        $expectedSum = 7;

        // Test Data
        $a = 2;
        $b = 5;

        $calculator = new Calculator();
        $sum        = $calculator->add($a, $b);

        $this->assertEquals($expectedSum, $sum);
    }

    /**
     * @covers \App\Example\Calculator::subtract
     * @covers \App\Example\Calculator::getDifference
     */
    public function testCanSubtractIntegers()
    {
        // Expected Result
        $expectedDifference = 4;

        // Test Data
        $a = 10;
        $b = 6;

        $calculator = new Calculator();
        $difference = $calculator->subtract($a, $b);

        $this->assertEquals($expectedDifference, $difference);
    }
}