<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'courses/' . $this->faker->image('public/storage/courses', 640, 480, null, false),
            //'url' => 'cursos/' . $this->faker->image(storage_path('app'.DIRECTORY_SEPARATOR .'cursos'), 640, 480, null, false)
        ];
    }
}
