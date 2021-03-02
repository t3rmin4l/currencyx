<?php

namespace App\Http\Controllers;

use App\Facades\Currency\Currency;
use App\Facades\Currency\CurrencyException;
use App\Http\Requests\CurrencyRateRequest;
use App\Models\Conversion;
use Illuminate\Http\JsonResponse;

class CurrencyRateController extends Controller
{
    /**
     * Return currency rate between source_currency and target_currency
     *
     * @param CurrencyRateRequest $request
     * @return JsonResponse
     */
    public function __invoke(CurrencyRateRequest $request): JsonResponse
    {
        # Try to get the rate of source_currency and target_currency, if it fails, return an error
        try {
            $rate = Currency::rate($request->get('source_currency'), $request->get('target_currency'));
        } catch (CurrencyException $ce) {
            return response()->json(['errors' => ['rates' => [$ce->getMessage()]]], 403);
        }

        # If we are here, we have successfully converted currencies, store the conversion in DB
        Conversion::create([
            'source_currency' => $request->get('source_currency'),
            'target_currency' => $request->get('target_currency'),
            'amount_converted' => $request->get('amount'),
        ]);

        return response()->json([
            'source_currency' => $request->get('source_currency'),
            'target_currency' => $request->get('target_currency'),
            'total' => number_format($rate * $request->get('amount'),  2),
            'amount' => number_format($request->get('amount'), 2),
        ]);
    }
}
