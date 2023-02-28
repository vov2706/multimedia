<?php

namespace App\Actions\Admin\Video;

use App\Models\Page;
use FFMpeg\FFMpeg;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StoreVideo
{
    /**
     * @throws \Exception
     */
    public function handle($file, Page $page)
    {
        if (strpos($file->getClientMimeType(), 'video') === false) {
            throw new \Exception('Доданий файл не є формату відео', 422);
        }

        $media = $page->addMediaFromRequest('video')->toMediaCollection('videos');

        // save the file in storage

        if (! $media->id) {
            throw new \Exception('Помилка збереження відео до бд', 500);
        }

        return $media;
    }
}
