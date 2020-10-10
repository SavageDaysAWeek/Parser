<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;

class FileResource
{
    public static function storeFile($image, $deletedImage = null)
    {
        Storage::disk('public')->delete($deletedImage);
        return $image->store(
            'products', 'public'
        );
    }
}
