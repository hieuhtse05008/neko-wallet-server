<?php

namespace Database\Factories;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'network_id' => $this->faker->word,
        'name' => $this->faker->word,
        'symbol' => $this->faker->word,
        'icon_url' => $this->faker->word,
        'decimal' => $this->faker->randomDigitNotNull,
        'address' => $this->faker->word
        ];
    }
}
