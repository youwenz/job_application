<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null, //passing existing user
            'address' => $this->faker->streetAddress(),
            'logo' => $this->faker->imageUrl(100, 100, 'business', true, 'logo'),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zipcode' => $this->faker->postcode(),
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraphs(2, true),
            'website' => $this->faker->url(),
        ];
    }
}
