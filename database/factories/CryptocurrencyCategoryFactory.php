<?php

namespace Database\Factories;

use App\Models\CryptocurrencyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CryptocurrencyCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CryptocurrencyCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cryptocurrency_id' => $this->faker->word,
        'category_id' => $this->faker->word
        ];
    }
}
