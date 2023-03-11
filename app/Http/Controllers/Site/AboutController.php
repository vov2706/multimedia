<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private const URL = 'about';

    /**
     * @throws ModelNotFoundException
     */
    public function __invoke(Request $request)
    {
        $page = Page::active()->where('url', self::URL)->firstOrFail();

        return view('site.pages.about.index', compact('page'));
    }
}
