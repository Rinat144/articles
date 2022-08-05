<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Author::class;

    public function definition()
    {
        $name = $this->faker->word;
        $surname = $this->faker->word;
        $slug = Str::slug($name . ' ' . $surname, '-');
        return [
            'name' => $name,
            'surname' => $surname,
            'avatar' => $this->faker->name,
            'date_at' => $this->faker->date('Y-m-d'),
            'biography' => $this->faker->text,
            'slug' => $slug,
        ];
    }
}
