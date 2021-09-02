<?php

namespace Database\Factories;

use App\Models\Network;
use Illuminate\Database\Eloquent\Factories\Factory;

class NetworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Network::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'chain_id' => $this->faker->randomDigitNotNull,
        'icon_url' => $this->faker->text,
        'short_name' => $this->faker->word,
        'symbol' => $this->faker->word,
        'wallet_derive_path' => $this->faker->word,
        'is_active' => $this->faker->word
        ];
    }
}
