<?php

namespace App\View\Components\Blade;

use Illuminate\View\Component;

class MenuLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public array $link,
        public string $type,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blade.menu-link');
    }
}
