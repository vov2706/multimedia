<?php

namespace App\Actions\Site;


use App\Classes\Site\Image\VideoDTO;
use App\Models\Page;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RetrievePageVideos
{
    public function handle(Page $page): Collection
    {
        $medias = $page->getMedia('videos');

        $videos = collect();

        foreach ($medias as $key => $media) {
            $videos->push((new VideoDTO($media->original_url)));
        }

        return $videos;
    }
}