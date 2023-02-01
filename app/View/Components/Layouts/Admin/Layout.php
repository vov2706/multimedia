<?php

namespace App\View\Components\Layouts\Admin;

use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.admin.layout');
    }
}
