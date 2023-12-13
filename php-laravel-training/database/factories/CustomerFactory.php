<?php

namespace Database\Factories;

use App\Models\Customer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * Define the model's default state.
 *
 * @return array
 */
$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $this->$faker->name,
        'phone' => $this->$faker->phone,
        'email' => $this->$faker->email,

    ];
});
