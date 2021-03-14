<?php

namespace Database\Factories;

use App\Models\Programming;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programming::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'show_name' => $this->faker->word(),
            'start' => '00:00:00',
            'end' => '00:00:00',
        ];
    }
}
