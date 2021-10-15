<?php

namespace Database\Factories;

use App\Models\BlogLinkGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogLinkGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogLinkGroup::class;

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
