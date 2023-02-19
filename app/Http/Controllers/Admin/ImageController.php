<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected const URL = 'virtual-studio';

    public function index()
    {
        $page = Page::query()->where('url', self::URL)->first();

        if (! $page) {
            abort(404);
        }

        return view('admin.pages.images.index', compact('page'));
    }

    public function store(Request $request)
    {
        $images = $request->get('text-images', []);
        $removeImageIds = $request->get('delete_gallery', []);
        $page = Page::query()->where('url', self::URL)->first();

        if (! $page) {
            return redirect(route('admin.index'))
                ->withErrors('Сторінку не знайдено!');
        }

        try {
            if (! empty($images)) {
                foreach ($images as $image) {
                    $page->addMediaFromBase64($image)
                        ->toMediaCollection('images');
                }
            }

            if (! empty($removeImageIds)) {
                foreach ($removeImageIds as $id => $deleted) {
                    if ($deleted) {
                        $page->media->where('id', $id)->first()->delete();
                    }
                }
            }

            $request->session()->flash('message', 'Оновлено успішно!');
        } catch (\Throwable $exception) {
            return back()
                ->withInput()
                ->withErrors($exception->getMessage());
        }

        return redirect(route('admin.images.index'));
    }
}
