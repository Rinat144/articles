<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->name;
        $slug = Str::slug($name, '-');
        return [
            'name' => $name,
            'image' => $this->faker->imageUrl,
            'describe' => $this->faker->text,
            'slug' => $slug,
        ];
    }
}
