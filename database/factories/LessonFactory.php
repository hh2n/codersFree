<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://www.youtube.com/watch?v=iJFKwSZeqxQ',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/iJFKwSZeqxQ?si=84A3g2lp0uQpTKFd" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'platform_id' => 1    
        ];
    }
}
