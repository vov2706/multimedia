<?php

namespace App\Actions\Admin\Image;

use App\Models\Page;

class DeleteImages
{
    public function handle(Page $page, array $removeImageIds)
    {
        if (! empty($removeImageIds)) {
            foreach ($removeImageIds as $id => $deleted) {
                if ($deleted) {
                    $page->media->where('id', $id)->first()->delete();
                }
            }
        }
    }
}
