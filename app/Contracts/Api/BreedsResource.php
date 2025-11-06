<?php

declare(strict_types=1);

namespace App\Contracts\Api;

use Illuminate\Support\Collection;

interface BreedsResource
{
    /**
     * Get breed based on breed ID
     *
     * @throws \Illuminate\Http\Client\ConnectionException
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function get(int $breedId): Breed;

    /**
     * List breeds
     *
     * @throws \Illuminate\Http\Client\ConnectionException
     * @throws \Illuminate\Http\Client\RequestException
     * @return \Illuminate\Support\Collection<int, \App\Http\Services\CatApi\Dto\Breed>
     */
    public function list(): Collection;
}
