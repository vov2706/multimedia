<?php

namespace App\Classes\Site\Image;

use Illuminate\Contracts\Support\Arrayable;

class ImageDTO implements Arrayable
{
    public string $url;

    public string $alt;

    public function __construct(string $url, string $alt)
    {
        $this->url = $url;
        $this->alt = $alt;
    }

    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'alt' => $this->alt
        ];
    }
}
