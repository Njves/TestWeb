<?php

namespace App\DTO;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class NoteDto extends Data
{
    public readonly ?string $date;
    public function __construct(
        public int $id,
        public ?string $text,
        ?string $date,
        public ?int $contact_id
    ) {
        $this->date = Carbon::parse($date);
    }
}
