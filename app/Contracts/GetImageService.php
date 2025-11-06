<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Contracts\Api\Image;

interface GetImageService
{
    /**
     * Get image
     */
    public function execute(int $imageId): ?Image;
}
