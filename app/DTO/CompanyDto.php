<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class CompanyDto extends Data
{
    public function __construct(
        public string $id,
        public ?string $name,
        public ?string $address,
    )
    {

    }
}
