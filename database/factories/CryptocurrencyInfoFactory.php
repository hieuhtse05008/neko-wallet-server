<?php

namespace Database\Factories;

use App\Models\CryptocurrencyInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CryptocurrencyInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CryptocurrencyInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cryptocurrency_id' => $this->faker->word,
        'description' => $this->faker->text,
        'links' => $this->faker->word
        ];
    }
}
