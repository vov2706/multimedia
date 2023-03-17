<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Video\StoreVideo;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VideoController extends Controller
{
    protected const URL = 'virtual-viewers-zone';

    public function index()
    {
        $page = Page::query()->where('url', self::URL)->first();

        if (! $page) {
            return redirect(route('admin.index'))->withErrors('Сторінки не існує!');
        }

        return view('admin.pages.videos.index', compact('page'));
    }

    public function store(Request $request)
    {
        if (! $request->hasFile('video')) {
            return response()->json(['error' => 'Файл відсутній.'], 400);
        }

        $request->validate([
           'video' => 'required|file'
        ]);

        $page = $this->getPage();

        try {
            $media = app(StoreVideo::class)->handle($request->file('video'), $page);
        } catch (\Throwable $exception) {
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }

        return $media->file_name;
    }

    public function show(): \Illuminate\Http\JsonResponse
    {
        $videos = $this->getPage()->getMedia('videos')->sortBy('id');

        return response()->json(['videos' => $videos->toArray()]);
    }

    public function destroy(Media $video)
    {
        $video->delete();

        $videos = $this->getPage()->getMedia('videos')->sortBy('id');

        return response()->json(['videos' => $videos->toArray()]);
    }

    protected function getPage()
    {
        $page = Page::query()->where('url', self::URL)->first();

        if (! $page) {
            return response()->json(['error' => 'Сторінки не існує, будь ласка перезавантажте сторінку'], 404);
        }

        return $page;
    }
}
