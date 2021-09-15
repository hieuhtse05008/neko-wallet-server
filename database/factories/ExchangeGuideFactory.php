<?php

namespace Database\Factories;

use App\Models\ExchangeGuide;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExchangeGuideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExchangeGuide::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'description' => $this->faker->text,
        'url' => $this->faker->word,
        'image_url' => $this->faker->word,
        'coingecko_id' => $this->faker->word,
        'guide_html' => $this->faker->text
        ];
    }
}
