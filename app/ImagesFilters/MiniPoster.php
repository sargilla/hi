<?php

namespace App\ImagesFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class MiniPoster implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(null, 200, function ($constraint) {
		    $constraint->aspectRatio();
		});
    }
}
