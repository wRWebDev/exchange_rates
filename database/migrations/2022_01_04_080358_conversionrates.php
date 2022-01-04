<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Helpers\ExchangeRates;

class Conversionrates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        
        Schema::create('exchange_rates', function(Blueprint $table) {

            $exchangeHelper = new ExchangeRates;
            $currencies = $exchangeHelper->currencies;

            $table->increments('id');
            $table->enum('from', $currencies);
            $table->enum('to', $currencies);
            $table->float('rate', 8, 6);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_rates');
    }
}
