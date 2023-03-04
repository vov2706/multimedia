<?php

namespace App\View\Components\Site;

use App\Classes\LocaleReplacer;
use App\Models\Page;
use Illuminate\View\Component;

class Header extends Component
{
    public function render()
    {
        $pages = Page::sitePages();
        $localeLinks = app(LocaleReplacer::class)->getLinks(request()->getRequestUri());

        return view('components.site.header', compact('pages', 'localeLinks'));
    }
}
