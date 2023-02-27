<?php

namespace App\View\Components\Layouts\Admin;

use Illuminate\View\Component;

class Layout extends Component
{
    public bool $showIndexScripts = true;

    public function __construct(bool $showIndexScripts = true)
    {
        $this->showIndexScripts = $showIndexScripts;
    }

    public function render()
    {
        return view('components.layouts.admin.layout');
    }
}
