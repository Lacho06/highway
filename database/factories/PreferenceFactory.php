<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preference>
 */
class PreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'main_title' => $this->faker->sentence(),
            'main_subtitle' => $this->faker->sentence(),
            'main_video' => null,
            'nav_subtitle' => $this->faker->sentence()
        ];
    }
}
