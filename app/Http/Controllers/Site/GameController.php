<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private const URL = 'games';

    /**
     * @throws ModelNotFoundException
     */
    public function __invoke(Request $request)
    {
        $page = Page::active()->where('url', self::URL)->firstOrFail();

        return view('site.pages.game.index', compact('page'));
    }
}
