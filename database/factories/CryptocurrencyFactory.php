<?php

namespace Database\Factories;

use App\Models\Cryptocurrency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CryptocurrencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cryptocurrency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'symbol' => $this->faker->word,
        'slug' => $this->faker->text,
        'icon_url' => $this->faker->text,
        'rank' => $this->faker->randomDigitNotNull,
        'verified' => $this->faker->word
        ];
    }
}
