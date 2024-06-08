<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StoreFactory extends Factory
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
            'logo_image'=>$this->faker->imageUrl(150,150),
            'cover_image'=>$this->faker->imageUrl(600,600),
            'status'=>$this->faker->randomElement(['active','notActive']),
        ];
    }
}
