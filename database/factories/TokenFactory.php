<?php

namespace Database\Factories;

use App\Models\Token;
use Illuminate\Database\Eloquent\Factories\Factory;

class TokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Token::class;

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
        'decimals' => $this->faker->randomDigitNotNull,
        'address' => $this->faker->word,
        'icon_url' => $this->faker->text,
        'verified' => $this->faker->word,
        'active_wallet' => $this->faker->word,
        'cryptocurrency_id' => $this->faker->word,
        'network_id' => $this->faker->word
        ];
    }
}
