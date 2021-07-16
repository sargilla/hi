<?php

namespace App\ImagesFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Slideshow implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(760, 380);
        // return $image->resize(null, 380, function ($constraint) {
		//     $constraint->aspectRatio();
		// });

    }
}