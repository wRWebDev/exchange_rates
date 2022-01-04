<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Helpers\ExchangeRates;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $exchangeHelper = new ExchangeRates;
            $currencies = $exchangeHelper->currencies;

            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('company');
            $table->integer('hourly_rate');
            $table->enum('rate_currency', $currencies);
            $table->enum('viewing_currency', $currencies);
            $table->string('img');
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('users');
    }
}
