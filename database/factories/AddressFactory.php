<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
            'street'   =>   $this->faker->streetAddress(),
            'suite'   =>   $this->faker->streetName(),
            'city'  =>   $this->faker->city(),
            'zipcode'  =>   $this->faker->postcode(), 
        ];
    }

     
}
