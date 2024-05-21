<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition()
    {
        return [
            'text' => $this->faker->text,
            'date' => $this->faker->dateTime,
            'contact_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
