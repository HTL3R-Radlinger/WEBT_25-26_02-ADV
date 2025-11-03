<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    // Tests for add()
    public function testAddMitPositivenZahlen(): void
    {
        $result = $this->calculator->add(3.0, 5.0);
        $this->assertEquals(8.0, $result);
    }

    public function testAddMitNegativenZahlen(): void
    {
        $result = $this->calculator->add(-2.0, -5.0);
        $this->assertSame(-7.0, $result); // Same Type
    }

    public function testAddMitNull(): void
    {
        $result = $this->calculator->add(0, 10);
        $this->assertEquals(10.0, $result);
    }

    // Tests for divide()
    public function testDivideMitGueltigenWerten(): void
    {
        $result = $this->calculator->divide(10.0, 2.0);
        $this->assertEquals(5.0, $result);
        $this->assertIsFloat($result); // Additional test for Type
    }

    public function testDivideDurchNullWirftException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Division durch Null ist nicht erlaubt.");
        $this->calculator->divide(5.0, 0.0);
    }

    public function testDivideMitNegativenZahlen(): void
    {
        $result = $this->calculator->divide(-10.0, 2.0);
        $this->assertEquals(-5.0, $result);
    }
}
