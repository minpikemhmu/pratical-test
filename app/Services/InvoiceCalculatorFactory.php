<?php
namespace App\Services;

use App\Services\Contracts\InvoiceCalculatorInterface;

class InvoiceCalculatorFactory
{
    public static function create(string $provider, float $baseAmount): InvoiceCalculatorInterface
    {
        switch ($provider) {
            case 'mpt':
                return new MptInvoiceCalculator($baseAmount);
            case 'ooredoo':
                return new OoredooInvoiceCalculator($baseAmount);
            default:
                throw new \InvalidArgumentException("Invalid provider: {$provider}");
        }
    }
}
