<?php

namespace App\View\Components\Admin;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class SidebarNavLink extends Component
{
    public string $href;

    public string $iconClass;

    /**
     * @var null|string|bool
     */
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $iconClass, $active = null)
    {
        $this->href = $href;
        $this->iconClass = $iconClass;
        $this->active = $active ?? $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $classes = ['active' => $this->isActive()];

        return view('components.admin.sidebar-nav-link', [
            'classes' => Arr::toCssClasses($classes),
        ]);
    }

    protected function isActive(): bool
    {
        if (is_bool($this->active)) {
            return $this->active;
        }

        $urls = collect(explode(',', $this->active))->each(fn ($item, $key) => trim($item));
        foreach ($urls as $url) {
            if (request()->is($url)) {
                return true;
            }

            if (request()->fullUrlIs($url)) {
                return true;
            }

            if (request()->routeIs($url)) {
                return true;
            }
        }

        return false;
    }
}
