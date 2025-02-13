<?php

namespace Database\Factories;

use App\Enums\YachtType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Yacht>
 */
class YachtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>$this->faker->name(),
            'type'=>$this->faker->randomElement(YachtType::cases()),
            'capacity'=>$this->faker->randomDigit(),
            'hourly_rate'=>$this->faker->randomDigit(),
        ];
    }
}
