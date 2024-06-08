<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
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
            'name'=> $name,
            'description' =>$this->faker->sentence(10),
            'slug'=>Str::slug($name),
            'image'=>$this->faker->imageUrl(),
            'status'=>$this->faker->randomElement(['active','notActive']),
            'parent_id'=>Category::inRandomOrder()->first()->id,
        ];
    }
}
