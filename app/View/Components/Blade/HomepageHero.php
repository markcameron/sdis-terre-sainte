<?php

namespace App\View\Components\Blade;

use A17\Twill\Models\Feature;
use Illuminate\View\Component;

class HomepageHero extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blade.homepage-hero', [
            'hero' => Feature::getForBucket('home_heros')->random(),
        ]);
    }
}
