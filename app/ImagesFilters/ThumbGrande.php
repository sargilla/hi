<?php

namespace App\ImagesFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class ThumbGrande implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas(250, 250, 'center', false);
    }

}
