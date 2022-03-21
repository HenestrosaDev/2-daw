<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $completed = $this->faker->randomElement([0, 1]);
        
        $completed_at = null;
        if ($completed) {
            $completed_at = Carbon::now()->format('Y-m-d H:i:s');
        }

        return [
            'name' => $this->faker->sentence(),
            'completed' => $completed,
            'completed_at' => $completed_at,
        ];
    }
}
