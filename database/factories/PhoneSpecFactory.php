<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhoneSpec>
 */
class PhoneSpecFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "date" => $this->faker->date(),
            "memory" => $this->faker->text(),
            "SoC" => $this->faker->text(),
            "cameras" => $this->faker->text(),
            "thumbnail" => $this->faker->image("public/storage/images", 480, 480, null, false),
        ];
    }
}
