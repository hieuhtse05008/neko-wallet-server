<?php

namespace Database\Factories;

use App\Models\SwapOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class SwapOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SwapOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->word,
        'fee' => $this->faker->word,
        'current_step' => $this->faker->word,
        'swap_id' => $this->faker->word,
        'from_swap_transaction_id' => $this->faker->word,
        'from_dex_order_request_id' => $this->faker->word,
        'to_swap_transaction_id' => $this->faker->word,
        'to_dex_order_request_id' => $this->faker->word
        ];
    }
}
