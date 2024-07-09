<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement([1, 2, 3]),
            'email' => $this->faker->unique()->safeEmail,
            'tell' => $this->faker->phoneNumber(),
            'address' => $this->faker->address,
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->text(120),
        ];
    }
}
