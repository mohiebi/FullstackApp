<?php

namespace App\DTO;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class ListingImageData
{
    public function __construct(
        public int $id,
        public string $filename,
        public string $src
    ) {}
}
