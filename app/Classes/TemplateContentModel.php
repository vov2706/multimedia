<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class TemplateContentModel extends Model
{
    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        $content = $this->contents->where('lang', get_locale())->first();

        return ($content->name ?? '');
    }

    /**
     * @return string
     */
    public function getH1Attribute(): string
    {
        $content = $this->contents->where('lang', get_locale())->first();

        return ($content->h1 ?? '');
    }

    /**
     * @return string
     */
    public function getTitleAttribute(): string
    {
        $content = $this->contents->where('lang', get_locale())->first();

        return ($content->title ?? '');
    }

    /**
     * @return string
     */
    public function getDescriptionAttribute(): string
    {
        $content = $this->contents->where('lang', get_locale())->first();

        return ($content->description ?? '');
    }

    /**
     * @return string
     */
    public function getTextAttribute(): string
    {
        $content = $this->contents->where('lang', get_locale())->first();

        return ($content->text ?? '');
    }
}
