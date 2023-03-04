<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private const URL = 'virtual-studio';

    /**
     * @throws ModelNotFoundException
     */
    public function __invoke(Request $request)
    {
        $page = Page::active()->where('url', self::URL)->firstOrFail();

        return view('site.pages.images.index', compact('page'));
    }
}
