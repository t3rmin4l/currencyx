<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Conversion extends Model
{
    protected $guarded = [];

    /**
     * Return the most popular destination currency code
     *
     * @return string|null
     */
    public static function mostPopularDestinationCurrency(): ?string
    {
        return Conversion::select(['target_currency', DB::raw('count(*) as total')])
            ->groupBy('target_currency')
            ->orderBy('total', 'desc')
            ->first()
            ?->target_currency;
    }

    /**
     * Return total amount of currency converted
     *
     * @param $currency
     * @return float
     */
    public static function totalAmountConvertedIn($currency): float
    {
        return Conversion::where(['source_currency' => $currency])->sum('amount_converted');
    }

    /**
     * @return int
     */
    public static function total(): int
    {
        return Conversion::all()->count();
    }
}
