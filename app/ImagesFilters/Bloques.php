<?php

namespace App\ImagesFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Bloques implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(450, null, function ($constraint) {
		    $constraint->aspectRatio();
		});
    }

}
