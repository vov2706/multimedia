<?php

namespace App\Actions\Admin\Image;

use App\Models\Page;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\InvalidBase64Data;

class StoreImages
{
    /**
     * @throws FileCannotBeAdded
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws InvalidBase64Data
     */
    public function handle(Page $page, array $images)
    {
        if (! empty($images)) {
            foreach ($images as $image) {
                $page->addMediaFromBase64($image)
                    ->toMediaCollection('images');
            }
        }
    }
}
