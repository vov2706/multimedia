<?php

namespace App\Http\Controllers\Site;

use App\Actions\Site\RetrievePageVideos;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    private const URL = 'virtual-viewers-zone';

    /**
     * @throws ModelNotFoundException
     */
    public function __invoke(Request $request)
    {
        $page = Page::active()->where('url', self::URL)->firstOrFail();
        $videos = (new RetrievePageVideos)->handle($page)->toArray();

        return view('site.pages.videos.index', compact('page', 'videos'));
    }
}
