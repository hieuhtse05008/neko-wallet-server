<?php

namespace Database\Factories;

use App\Models\CryptocurrencyMapping;
use Illuminate\Database\Eloquent\Factories\Factory;

class CryptocurrencyMappingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CryptocurrencyMapping::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cryptocurrency_id' => $this->faker->word,
        'coingecko_id' => $this->faker->word,
        'cmc_id' => $this->faker->word,
        'binance_id' => $this->faker->word
        ];
    }
}
