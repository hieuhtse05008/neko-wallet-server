<?php

namespace Database\Factories;

use App\Models\Swap;
use Illuminate\Database\Eloquent\Factories\Factory;

class SwapFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Swap::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word,
        'from_contract_id' => $this->faker->word,
        'from_address' => $this->faker->word,
        'from_value' => $this->faker->word,
        'from_price' => $this->faker->word,
        'from_gas_price' => $this->faker->word,
        'from_gas_limit' => $this->faker->word,
        'to_contract_id' => $this->faker->word,
        'to_address' => $this->faker->word,
        'to_value' => $this->faker->word,
        'to_price' => $this->faker->word,
        'to_gas_price' => $this->faker->word,
        'to_gas_limit' => $this->faker->word
        ];
    }
}
