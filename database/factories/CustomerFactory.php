<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition()
    {
        return [
            'company_id' => \App\Models\Company::factory()->create(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'active' => 1,
        ];
    }
}
