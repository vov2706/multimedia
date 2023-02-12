<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_id',
        'lang',
        'name',
        'h1',
        'h2',
        'title',
        'description',
        'text',
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
    ];
}
