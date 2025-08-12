<?php

namespace App\DTO;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class OfferData
{
    public function __construct(
        public int $id,
        public float $amount,
        public ?string $accepted_at = null,
        public ?string $rejected_at = null,
        public ?UserData $bidder = null
    ) {}
}
