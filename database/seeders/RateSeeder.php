<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $defaultRates = [
            [ 'from' => "GBP", 'to' => "USD", 'rate' => "1.3" ],
            [ 'from' => "GBP", 'to' => "EUR", 'rate' => "1.1" ],
            [ 'from' => "EUR", 'to' => "GBP", 'rate' => "0.9" ],
            [ 'from' => "EUR", 'to' => "USD", 'rate' => "1.2" ],
            [ 'from' => "USD", 'to' => "GBP", 'rate' => "0.7" ],
            [ 'from' => "USD", 'to' => "EUR", 'rate' => "0.8" ]
        ];

        DB::table('exchange_rates')->insertOrIgnore( $defaultRates );

    }
}
