<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testCanRunMyFirstTest()
    {
        $myFailingMessage   = "--- RED ---";
        $this->fail($myFailingMessage);
    }
}