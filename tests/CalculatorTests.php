<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Calculator;

/**
 * Unit Tests für die Calculator-Klasse.
 */
class CalculatorTest extends TestCase
{
    private Calculator $calc;

    /**
     * Fixture: wird vor jedem Test ausgeführt.
     */
    protected function setUp(): void
    {
        $this->calc = new Calculator();
    }

    public function testAddMitPositivenZahlen(): void
    {
        $this->assertEquals(8, $this->calc->add(3, 5));
    }

    public function testAddMitNegativenZahlen(): void
    {
        $this->assertSame(-7.0, $this->calc->add(-2, -5));
    }

    public function testMultiplyMitNull(): void
    {
        $this->assertEquals(0, $this->calc->multiply(0, 9));
    }

    public function testMultiplyMitDezimalzahlen(): void
    {
        $this->assertEqualsWithDelta(7.5, $this->calc->multiply(2.5, 3), 0.0001);
    }

    public function testDivideMitGültigenWerten(): void
    {
        $result = $this->calc->divide(10, 2);
        $this->assertEquals(5, $result);
        $this->assertIsFloat($result);
    }

    public function testDivideDurchNullWirftException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Division durch Null ist nicht erlaubt.");
        $this->calc->divide(10, 0);
    }
}
