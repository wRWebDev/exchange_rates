<?php

    /*
     *
     *  Requirements:
     *      • https://exchangeratesapi.io/ paid account
     *      • EXCHANGE_RATE_API_KEY must be set in .env
     * 
     *      It must be a paid account to be able to use the 'All Base Rates' feature,
     *      allowing you to get the exchange rates based on a given currency.
     * 
     */

    namespace App\Http\Controllers\Helpers;

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\DB;
    use App\Exceptions\Handler;
    use Illuminate\Support\Facades\Auth;

    class ExchangeRates 
    {

        public $currencies = [ 'GBP', 'EUR', 'USD' ];
        
        private $table = 'exchange_rates';

        public function get( bool $forceLatest = false, string $baseCurrency = null ) {

            $numberOfStaleRates = DB::table( $this->table )
                ->whereRaw( 'updated_at < DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY)' )
                ->count();

            if( $numberOfStaleRates || $forceLatest )
                $this->saveRatesToDB( $this->fetchLatestFromAPI() );

            return DB::table( $this->table )
                ->select( 'from', 'rate', 'updated_at' )
                ->where( 'to', '=', $baseCurrency ?: Auth::user()->currency )
                ->get();

        }

        private function fetchLatestFromAPI() {
            
            $res = [];

            foreach( $this->currencies as $base ) {

                $data = Http::get( 'http://api.exchangeratesapi.io/v1/latest', [
                    'access_key' => $_ENV['EXCHANGE_RATE_API_KEY'],
                    'base' => $base,
                    'symbols' => implode( ",", array_filter( $this->currencies, function( $currency ) use( $base ) {
                        return $currency !== $base;
                    }))
                ]);

                if( $data->failed() ) continue;

                foreach( json_decode( $data->body() )->rates as $currency => $rate ) {
                    $res[] = ( object )[
                        'from' => $base,
                        'to' => $currency,
                        'rate' => $rate
                    ];
                }

            }

            return $res;

        }

        private function saveRatesToDB( $rows ) {

            foreach( $rows as $row )
                DB::table( $this->table )
                    ->where( 'from', '=', $row->from )
                    ->where( 'to', '=', $row->to )
                    ->update([ 'rate' => $row->rate ]);

        }

        private function getRatesLocally() {
            return [
                ( object )[ 'from' => "GBP", 'to' => "USD", 'rate' => "1.3" ],
                ( object )[ 'from' => "GBP", 'to' => "EUR", 'rate' => "1.1" ],
                ( object )[ 'from' => "EUR", 'to' => "GBP", 'rate' => "0.9" ],
                ( object )[ 'from' => "EUR", 'to' => "USD", 'rate' => "1.2" ],
                ( object )[ 'from' => "USD", 'to' => "GBP", 'rate' => "0.7" ],
                ( object )[ 'from' => "USD", 'to' => "EUR", 'rate' => "0.8" ]
            ];
        }

    }

?>