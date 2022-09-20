<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker_ar = \Faker\Factory::create('ar_JO');
        return [
            'name' => [
                'en' => $this->faker->name,
                'ar' => $faker_ar->name
            ],
            'description' => [
                'en' => $this->faker->sentence,
                'ar' => $faker_ar->sentence
            ],
            'with_vat' => rand(0,1),
            'price' => (float) $this->faker->randomNumber('4'),
            'store_id' => Store::inRandomOrder()->first()->id
        ];
    }
}
