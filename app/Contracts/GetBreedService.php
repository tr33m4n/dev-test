<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Contracts\Api\Breed;

interface GetBreedService
{
    /**
     * Get breed
     */
    public function execute(int $breedId): ?Breed;
}
