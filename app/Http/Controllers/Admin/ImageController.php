<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Image\DeleteImages;
use App\Actions\Admin\Image\StoreImages;
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
        $page = Page::where('url', self::URL)->first();

        if (! $page) {
            return redirect(route('admin.index'))
                ->withErrors('Сторінку не знайдено!');
        }

        try {
            (new StoreImages)->handle($page, $request->get('text-images', []));
            (new DeleteImages)->handle($page, $request->get('delete_gallery', []));

            $request->session()->flash('message', 'Оновлено успішно!');
        } catch (\Throwable $exception) {
            return back()
                ->withInput()
                ->withErrors($exception->getMessage());
        }

        return redirect(route('admin.images.index'));
    }
}
