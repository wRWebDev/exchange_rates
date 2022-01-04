<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Http\Controllers\Helpers\ExchangeRates;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $exchangeHelper = new ExchangeRates;
        $currencies = $exchangeHelper->currencies;

        return [
            'name' => $this->faker->name(),
            'role' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'rate' => rand(20,100),
            'rate_currency' => $currencies[ rand(0,2) ],
            'img' => ('https://randomuser.me/api/portraits/lego/' . rand(0,8) . '.jpg'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
