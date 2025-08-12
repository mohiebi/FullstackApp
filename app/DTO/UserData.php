<?php

namespace App\DTO;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class UserData
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $email = null
    ) {}
}
