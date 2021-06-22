<?php

namespace App\Tests;

use App\Taxes\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculator()
    {
        $calculator = new Calculator;

        $result = $calculator->calcul(150000, 25, 1.75);

        $this->assertEquals(675, $result);
    }
}
