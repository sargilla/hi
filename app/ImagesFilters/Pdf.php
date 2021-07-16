<?php

namespace App\ImagesFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Pdf implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(30, 30);
    }
}
