<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'user_id' => $this->faker->randomDigitNotNull,
            'responsible_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
