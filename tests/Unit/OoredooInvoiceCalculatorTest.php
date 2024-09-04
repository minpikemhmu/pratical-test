<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\OoredooInvoiceCalculator;

class OoredooInvoiceCalculatorTest extends TestCase
{
    /**
     * Test the calculation of the invoice amount for Ooredoo provider.
     *
     * @return void
     */
    public function testCalculateInvoiceAmount()
    {
        $baseAmount = 200.00; // Example base amount
        $calculator = new OoredooInvoiceCalculator($baseAmount);

        // Calculate the expected invoice amount
        $expectedServiceCharge = 0.12 * $baseAmount; // Assuming different service charge rate for Ooredoo
        $expectedInvoiceAmount = $baseAmount + $expectedServiceCharge;

        // Assert that the calculated invoice amount is correct
        $this->assertEquals($expectedInvoiceAmount, $calculator->calculate());
    }
}
