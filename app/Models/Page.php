<?php

namespace App\Models;

use App\Classes\TemplateContentModel;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
        $this->addMediaCollection('videos');
    }

    public function scopeActive($builder)
    {
        return $builder->where('active', 1);
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

    public function getUrl()
    {
//        if () {
//
//        }

        return route($this->url, [get_locale()]);
    }

    public static function sitePages()
    {
        return Cache::rememberForever('site_pages', function () {
            return Page::with('contents')
                ->active()
                ->orderBy('sort')
                ->get();
        });
    }

    public static function boot()
    {
        parent::boot();

        static::updated(fn() => Cache::forget('site_pages'));
        static::deleted(fn() => Cache::forget('site_pages'));
    }
}
