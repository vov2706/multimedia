<?php

namespace App\Actions\Site;

use App\Classes\Site\Image\ImageDTO;
use App\Models\Page;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RetrievePageMedia
{
    public function handle(Page $page): Collection
    {
        $medias = $page->getMedia('images');

        $images = collect();

        foreach ($medias as $key => $media) {
            $images->push((new ImageDTO($media->original_url, $this->makeAlt($media))));
        }

        return $images;
    }

    protected function makeAlt(Media $media): string
    {
        return $media->name . ', фото';
    }
}
