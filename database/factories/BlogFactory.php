<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->text,
        'title' => $this->faker->text,
        'image_url' => $this->faker->text,
        'content_en' => $this->faker->text,
        'status' => $this->faker->word,
        'type' => $this->faker->word,
        'tags' => $this->faker->word
        ];
    }
}
