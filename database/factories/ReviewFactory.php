<?php

namespace Database\Factories;

use App\Enums\ReservationStatus;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'reservation_id'=>Reservation::factory(),
            'reviewer_name'=>$this->faker->name(),
            'text'=>$this->faker->paragraph(),
            'rating'=>$this->faker->numberBetween(1,5)
        ];
    }
}
