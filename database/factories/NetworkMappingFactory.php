<?php

namespace Database\Factories;

use App\Models\NetworkMapping;
use Illuminate\Database\Eloquent\Factories\Factory;

class NetworkMappingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NetworkMapping::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'network_id' => $this->faker->word,
        'coingecko_id' => $this->faker->word,
        'cmc_id' => $this->faker->word,
        'binance_id' => $this->faker->word
        ];
    }
}
