<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class UserDto extends Data
{
    public function __construct(
        public int $id,
        public ?string $name,
        public ?string $last_name,
        public ?int $unit_id
    ) {}
}
