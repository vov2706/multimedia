<?php

namespace App\Actions\Admin\Video;

use App\Models\Page;

class DeleteVideo
{
    public function handle(string $url)
    {
        $page = Page::query()->where('url', $url)->first();

        if (! $page) {
            throw new \Exception('Сторінка не існує, будь ласка перезавантажте сторінку', 404);
        }
    }
}
