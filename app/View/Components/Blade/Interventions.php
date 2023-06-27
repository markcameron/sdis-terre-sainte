<?php

namespace App\View\Components\Blade;

use App\Repositories\InterventionRepository;
use Illuminate\View\Component;

class Interventions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(private InterventionRepository $interventionRepository)
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
        return view('components.blade.interventions', [
            'interventions' => $this->interventionRepository->recent(),
        ]);
    }
}
