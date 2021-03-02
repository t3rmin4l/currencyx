<?php

namespace App\Http\Controllers;

use App\Facades\Currency\Currency;
use App\Models\Conversion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function __invoke(Request $request)
    {
        return view('welcome', [
            'currencies' => Currency::getAllCurrencies(),
            'mostPopularDestinationCurrency' => Conversion::mostPopularDestinationCurrency(),
            'totalAmountConvertedIn' => Conversion::totalAmountConvertedIn('USD'),
            'totalConversions' => Conversion::total(),
        ]);
    }
}
