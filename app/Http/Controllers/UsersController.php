<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helpers\ExchangeRates;

class UsersController extends Controller
{
    
    public function displayUsers( string $id ) {

        $user = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('users.user', ['users' => $user]);
        
    }

    public function displayAddUser() {
        
        $exchangeHelper = new ExchangeRates;
        $currencies = $exchangeHelper->currencies;

        return view('users.add', [
            'currencies' => $currencies
        ]);

    }

}
