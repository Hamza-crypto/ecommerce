<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    protected $model = Product::class;


    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'price' => rand(1500,8000),
            'image' => $this->faker->imageUrl(640,480,'people'),
            'category_id' => rand(1,10),
            'description' => $this->faker->realTextBetween(30,50),
        ];
    }
}
