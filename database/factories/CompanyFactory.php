<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'name' => $this->faker->company,
        ];
    }
}
