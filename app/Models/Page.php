<?php

namespace App\Models;

use App\Classes\TemplateContentModel;

class Page extends TemplateContentModel
{
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
}
