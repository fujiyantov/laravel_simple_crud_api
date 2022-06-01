<?php

namespace Database\Factories;

use App\Models\Banks;
use App\Models\Positions;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "phone_number" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "ktp_number" => $this->faker->numerify("############"),
            "date_of_birth" => $this->faker->date(),
            "account_number" => $this->faker->numerify("################"),
            "position_id" => Positions::inRandomOrder()->first()->id,
            "bank_id" => Banks::inRandomOrder()->first()->id,
        ];
    }
}
