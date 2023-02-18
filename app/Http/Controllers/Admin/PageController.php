<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Page\StorePageData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\UpdateRequest;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Загальна сторінка для вибору сторінки для редагування
     */
    public function index()
    {
        $items = Page::with('contents')->get();

        return view('admin.pages.site-pages.index', compact('items'));
    }

    public function edit(int $id)
    {
        $item = Page::find($id);

        if (! $item) {
            return redirect(route('admin.pages.index'))
                ->withErrors('Сторінку не знайдено');
        }

        $title = "Сторінка '{$item->name}'";

        return view('admin.pages.site-pages.edit', compact('item', 'title'));
    }

    public function update(UpdateRequest $request, Page $page): \Illuminate\Http\RedirectResponse
    {
        try {
            (new StorePageData())->handle($page, $request->validated());

            $request->session()->flash('message', 'Оновлено успішно!');
        } catch (\RuntimeException $exception) {
            return back()
                ->withInput()
                ->withErrors($exception->getMessage());
        } catch (\Throwable $exception) {
            return back()
                ->withInput()
                ->withErrors('Серверна помилка!');
        }

        return redirect(route('admin.pages.edit', [$page->id]));
    }
}
