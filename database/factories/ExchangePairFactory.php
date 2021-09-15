<?php

namespace Database\Factories;

use App\Models\ExchangePair;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExchangePairFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExchangePair::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'trade_url' => $this->faker->text,
        'base_token_id' => $this->faker->word,
        'target_token_id' => $this->faker->word,
        'exchange_guide_id' => $this->faker->word
        ];
    }
}
