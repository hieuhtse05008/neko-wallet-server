<?php

namespace Database\Factories;

use App\Models\BlogGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'type' => $this->faker->word
        ];
    }
}
