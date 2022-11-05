<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class LoginFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'tenant_id' => Tenant::factory(),
            'created_at' => fake()->dateTimeBetween('-6 hours', 'now'),
            'updated_at' => fake()->dateTimeBetween('-6 hours', 'now'),
        ];
    }
}
