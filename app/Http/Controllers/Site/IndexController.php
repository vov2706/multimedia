<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    public function __invoke()
    {
        return view('site.pages.home.index');
    }
}
