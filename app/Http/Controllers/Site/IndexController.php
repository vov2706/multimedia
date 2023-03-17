<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $page = Page::active()->where('url', 'index')->firstOrFail();

        return view('site.pages.home.index', compact('page'));
    }
}
