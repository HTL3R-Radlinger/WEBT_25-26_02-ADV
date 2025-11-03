<?php declare(strict_types=1);

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
    public function testAddPositiveNumbers(): void
    {
        $result = $this->calculator->add(3, 5);
        $this->assertEquals(8, $result);
    }

    public function testAddWithNegativeNumbers(): void
    {
        $result = $this->calculator->add(-3, -2);
        $this->assertSame(-5.0, $result); // Check Type
    }

    // Tests for subtract()
    public function testSubtract(): void
    {
        $result = $this->calculator->subtract(10, 4);
        $this->assertEqualsWithDelta(6, $result, 0.0001); // Delta for Floating point numbers
    }

    // Tests for multiply()
    public function testMultiply(): void
    {
        $result = $this->calculator->multiply(3, 4);
        $this->assertGreaterThan(0, $result);
    }

    // Tests for divide()
    public function testDivideValid(): void
    {
        $result = $this->calculator->divide(10, 2);
        $this->assertIsFloat($result); // Check Type
        $this->assertEquals(5, $result);
    }

    public function testDivideByZero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Division by Zero is not allowed.");
        $this->calculator->divide(5, 0);
    }
}
