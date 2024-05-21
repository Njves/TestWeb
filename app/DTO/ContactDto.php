<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class ContactDto extends Data
{
    public function __construct(
        public int $id,
        public ?string $email,
        public ?string $phone,
        public ?int $user_id,
        public ?int $responsible_id
    ) {}
}
