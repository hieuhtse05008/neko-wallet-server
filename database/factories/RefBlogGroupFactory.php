<?php

namespace Database\Factories;

use App\Models\RefBlogGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefBlogGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RefBlogGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_id' => $this->faker->word,
        'blog_group_id' => $this->faker->word
        ];
    }
}
