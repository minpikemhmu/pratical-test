<?php
namespace App\Services\Contracts;

interface InvoiceCalculatorInterface
{
    public function calculate(): float;
}
