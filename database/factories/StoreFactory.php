<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cost_shipping' => rand(5,10),
            'vat_type' => $this->faker->randomElement(['percentage', 'value']),
            'vat_value' => rand(5,10),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
