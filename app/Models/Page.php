<?php

namespace App\Models;

use App\Classes\TemplateContentModel;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends TemplateContentModel implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'url',
        'active',
        'sort',
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function contents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PageContent::class, 'page_id', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');

        // video
        $this->addMediaCollection('videos');
        $this->addMediaCollection('thumbnails');
    }

    /**
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(100)
            ->extractVideoFrameAtSecond(1)
            ->format()
            ->performOnCollections('videos');
    }

    public function getLocaleFields(): array
    {
        return [
            'name',
            'h1',
            'h2',
            'title',
            'description',
            'text',
        ];
    }
}
