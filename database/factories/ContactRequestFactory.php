<?php

namespace Database\Factories;

use App\Models\ContactRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'company' => $this->faker->word,
        'email' => $this->faker->word,
        'content' => $this->faker->text
        ];
    }
}
