<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Article::class;

    public function definition()
    {

        $name = $this->faker->name;
        $slug = Str::slug($name, '-');
        return [
            'name' => $name,
            'image' => $this->faker->imageUrl(),
            'preview' => $this->faker->word,
            'text' => $this->faker->text,
            'author_id' => Author::get()->random()->id,
            'slug' => $slug,
                //Str::random(10),
        ];
    }
}
