<?php

namespace Database\Factories;

use App\Models\CoinMarketsData;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoinMarketsDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CoinMarketsData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'coin_id' => $this->faker->text,
        'current_price' => $this->faker->text,
        'market_cap' => $this->faker->text,
        'total_volume' => $this->faker->text,
        'price_change_24h' => $this->faker->text,
        'price_change_percentage_24h' => $this->faker->text,
        'last_updated' => $this->faker->date('Y-m-d H:i:s'),
        'circulating_supply' => $this->faker->text,
        'total_supply' => $this->faker->text,
        'max_supply' => $this->faker->text,
        'market_cap_rank' => $this->faker->text,
        'fully_diluted_valuation' => $this->faker->text,
        'high_24h' => $this->faker->text,
        'ath' => $this->faker->text,
        'ath_change_percentage' => $this->faker->text,
        'ath_date' => $this->faker->text,
        'low_24h' => $this->faker->text,
        'atl' => $this->faker->text,
        'atl_change_percentage' => $this->faker->text,
        'atl_date' => $this->faker->text
        ];
    }
}
