<?php
namespace App\Services;

use App\Services\Contracts\InvoiceCalculatorInterface;

class OoredooInvoiceCalculator implements InvoiceCalculatorInterface
{
    protected $baseAmount;

    public function __construct(float $baseAmount)
    {
        $this->baseAmount = $baseAmount;
    }

    public function calculate(): float
    {
        $serviceCharge = 0.12 * $this->baseAmount; // Example: 12% service charge
        return $this->baseAmount + $serviceCharge;
    }
}
