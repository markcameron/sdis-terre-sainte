<?php

namespace App\View\Components\Blade;

use Illuminate\View\Component;
use Spatie\Navigation\Facades\Navigation;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $type = 'normal'
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd(Navigation::make()->tree());
        return view('components.blade.menu', [
            'tree' => Navigation::make()->tree(),
        ]);
    }
}
