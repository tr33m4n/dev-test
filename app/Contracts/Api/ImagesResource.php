<?php

declare(strict_types=1);

namespace App\Contracts\Api;

interface ImagesResource
{
    /**
     * Get image based on image ID
     *
     * @throws \Illuminate\Http\Client\ConnectionException
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function get(int $imageId): Image;
}
