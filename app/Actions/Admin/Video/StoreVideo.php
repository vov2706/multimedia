<?php

namespace App\Actions\Admin\Video;

use App\Models\Page;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StoreVideo
{
    /**
     * @throws \Exception
     */
    public function handle($file, Page $page): Media
    {
        if (strpos($file->getClientMimeType(), 'video') === false) {
            throw new \Exception('Доданий файл не є формату відео', 422);
        }

        $media = $page->addMediaFromRequest('video')->toMediaCollection('videos');

        if (! $media->id) {
            throw new \Exception('Помилка збереження відео до бд', 500);
        }

        return $media;
    }
}
