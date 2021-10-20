<?php

namespace App\ImagesFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Poster implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(null, 1024, function ($constraint) {
		    $constraint->aspectRatio();
		});
    }
}
