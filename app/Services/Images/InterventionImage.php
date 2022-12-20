<?php

namespace App\Services\Images;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class InterventionImage implements WatermarkInterface
{
    public function make(string $path): void
    {
        $fullPath = Storage::path($path);

        Image::make($fullPath)
            ->insert(public_path('default.png'))
            ->save($fullPath);
    }
}

