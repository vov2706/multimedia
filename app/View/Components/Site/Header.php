<?php

namespace App\View\Components\Site;

use App\Models\Page;
use Illuminate\View\Component;

class Header extends Component
{
    public function render()
    {
        $pages = Page::sitePages();

        return view('components.site.header', compact('pages'));
    }
}
