<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Paycomet\Backoffice\Courses\Infrastructure\Repositories\Models\Course;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->sentence,
            'detail' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
            'price' => $this->faker->numberBetween($min = 16, $max = 59),
        ];
    }
}
