<?php

namespace App\ImagesFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class PaginasGrande implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        // return $image->fit(760, 380);
        return $image->fit(500, 380);
        // return $image->resize(null, 380, function ($constraint) {
		//     $constraint->aspectRatio();
		// });
        // return $image->resize(250, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->resizeCanvas(250, 250, 'center', false);
    }

}
