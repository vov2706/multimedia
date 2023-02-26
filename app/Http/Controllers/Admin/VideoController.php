<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected const URL = 'virtual-viewers-zone';

    public function index()
    {
        $page = Page::query()->where('url', self::URL)->first();

        if (! $page) {
            abort(404);
        }

        return view('admin.pages.videos.index', compact('page'));
    }

    public function store(Request $request)
    {
        //
    }
}
