<?php

namespace Database\Factories;

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
        
       
        return [
            'category_id'=>1,
            'name'=>$this->faker->name(),
            'price'=>$this->faker->numberBetween(100,200),
            'quantity'=>$this->faker->numberBetween(1,10)
        ];
    }
}
