<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\MptInvoiceCalculator;

class MptInvoiceCalculatorTest extends TestCase
{
   /**
     * Test the calculation of the invoice amount for MPT provider.
     *
     * @return void
     */
    public function testCalculateInvoiceAmount()
    {
        $baseAmount = 100.00; // Example base amount
        $calculator = new MptInvoiceCalculator($baseAmount);

        // Calculate the expected invoice amount
        $expectedServiceCharge = 0.10 * $baseAmount;
        $expectedInvoiceAmount = $baseAmount + $expectedServiceCharge;

        // Assert that the calculated invoice amount is correct
        $this->assertEquals($expectedInvoiceAmount, $calculator->calculate());
    }
}
