<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\InvoiceCalculatorFactory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class WifiCalculatorController extends Controller
{
    public function calculateInvoiceAmount(Request $request, string $provider): JsonResponse
    {
        // Validate the request
        $request->validate([
            'base_amount' => 'required|numeric|min:0',
        ]);

        // Get the base amount from the request
        $baseAmount = $request->input('base_amount');

        // Create the appropriate invoice calculator
        $calculator = InvoiceCalculatorFactory::create($provider, $baseAmount);

        // Calculate the invoice amount
        $invoiceAmount = $calculator->calculate();

        // Return the response
        return response()->json([
            'code' => 200,
            'message' => "success",
            "data"  => [
                'provider' => $provider,
                'base_amount' => $baseAmount,
                'invoice_amount' => $invoiceAmount,
            ] 
        ]); 
    }
}
