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
        $page = $this->getPage();

        return view('admin.pages.videos.index', compact('page'));
    }

    public function store(Request $request)
    {
        // validate the incoming file
        if (! $request->hasFile('video')) {
            return response()->json(['error' => 'There is no file present.'], 400);
        }

        $page = $this->getPage();

        $request->validate([
            'video' => 'required|file|mimetypes:video/x-msvideo'
        ]);

        // save the file in storage
        $media = $page->addMediaFromRequest('video')->toMediaCollection('videos');

        if (! $media->id) {
            return response()->json(['error' => 'The file could not be saved.'], 500);
        }

        return $media->file_name;
    }

    public function show()
    {
        return $this->getPage()->getMedia('videos')->sortBy('id')->toArray();
    }

    protected function getPage()
    {
        $page = Page::query()->where('url', self::URL)->first();

        if (! $page) {
            return response()->json(['error' => 'Page doesn`t exists'], 404);
        }

        return $page;
    }
}
