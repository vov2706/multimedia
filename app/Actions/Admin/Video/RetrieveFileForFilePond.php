<?php

namespace App\Actions\Admin\Video;

use Illuminate\Support\Collection;

class RetrieveFileForFilePond
{
    public function handle(Collection $videos)
    {
        $files = collect();

        foreach ($videos as $item) {
            $files->push($item);
        }

        return $files;
    }
}
