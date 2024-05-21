<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class UnitDto extends Data
{
    public function __construct(
        public int $id,
        public ?string $name,
        public ?int $company_id
    ) {}
}
