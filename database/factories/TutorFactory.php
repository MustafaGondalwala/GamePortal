<?php

namespace Database\Factories;

use App\Models\TutorVerificationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutor>
 */
class TutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'profile_image' => 'https://source.unsplash.com/random/200x200?sig=1',
            'verification_status_id' => TutorVerificationStatus::where(['name' => 'Under Verification'])->first()->id,
            'status' => true,
        ];
    }
}
