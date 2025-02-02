<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(random_int(1,2),true);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->sentence(10),
            'image'=>$this->faker->imageUrl(300,300),
            'price'=>$this->faker->randomFloat(1,1,499),
            'compare_price'=>$this->faker->randomFloat(1,500,999),
            'featured'=>rand(0,1),
            'status'=>$this->faker->randomElement(['active','pending','notActive']),
            // 'store_id'=> Store::inRandomOrder()->first()->id,
            // 'category_id '=>Category::inRandomOrder()->first()->id,
        ];
    }
}
