<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class TemplateContentModel extends Model
{
    public function getNameAttribute(): string
    {
        return optional($this->contents->where('lang', get_locale())->first())->name ?? '';
    }

    public function getH1Attribute(): ?string
    {
        return optional($this->contents->where('lang', get_locale())->first())->h1;
    }

    public function getH2Attribute(): ?string
    {
        return optional($this->contents->where('lang', get_locale())->first())->h2;
    }

    public function getTitleAttribute(): ?string
    {
        return optional($this->contents->where('lang', get_locale())->first())->title;
    }

    public function getDescriptionAttribute(): ?string
    {
        return optional($this->contents->where('lang', get_locale())->first())->description;
    }

    public function getTextAttribute(): ?string
    {
        return optional($this->contents->where('lang', get_locale())->first())->text;
    }
}
