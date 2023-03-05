<?php

namespace App\Classes\Site\Image;

class VideoDTO
{
    public string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function toArray(): array
    {
        return [
            'url' => $this->url,
        ];
    }
}