<?php

namespace App\DTO;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class ListingData
{
    /**
     * @param ListingImageData[] $images
     * @param OfferData|null $offerMade
     */
    public function __construct(
        public int $id,
        public int $beds,
        public int $baths,
        public int $area,
        public string $city,
        public string $code,
        public string $street,
        public float $price,
        public UserData $owner,
        public array $images,
        public ?OfferData $offerMade = null,
    ) {}
}
