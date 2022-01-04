<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helpers\ExchangeRates;

class UsersController extends Controller
{
    
    public function displayUser( string $id ) {

        $user = DB::table('users')
            ->where('id', '=', $id)
            ->get();

        $exchangeHelper = new ExchangeRates;
        $currencies = $exchangeHelper->currencies;
        $baseCurrency = $user[0]->rate_currency;
        $xchangeRates = $exchangeHelper->get( $baseCurrency );

        $convertedRates = array_map(function( $rate ) use( $user, $exchangeHelper ) {
            return ( object )[
                'to' => $rate->to,
                'hourly' => number_format(( int )$user[0]->rate * ( float )$rate->rate, 2),
                'symbol' => $exchangeHelper->getSymbol( $rate->to )
            ];
        }, $xchangeRates);

        return view('users.user', [
            'users' => $user,
            'convertedRates' => $convertedRates
        ]);
        
    }

    public function displayAddUser() {
        
        $exchangeHelper = new ExchangeRates;
        $currencies = $exchangeHelper->currencies;

        return view('users.add', [
            'currencies' => $currencies
        ]);

    }

}
