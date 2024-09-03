<?php
namespace App\Services;

use App\Services\Contracts\InvoiceCalculatorInterface;

class MptInvoiceCalculator implements InvoiceCalculatorInterface
{
    protected $baseAmount;

    public function __construct(float $baseAmount)
    {
        $this->baseAmount = $baseAmount;
    }

    public function calculate(): float
    {
        $serviceCharge = 0.10 * $this->baseAmount; // Example: 10% service charge
        return $this->baseAmount + $serviceCharge;
    }
}
