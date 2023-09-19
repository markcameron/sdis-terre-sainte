<?php

namespace App\View\Components\Blade;

use App\Models\Intervention;
use A17\Twill\Models\Feature;
use Illuminate\View\Component;

class Stats extends Component
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
        return view('components.blade.stats', [
            'stats' => Feature::getForBucket('home_stats'),
            'interventionCount' => Intervention::whereBetween('date', [now()->startOfYear(), now()->endOfYear()])->count(),
        ]);
    }
}
