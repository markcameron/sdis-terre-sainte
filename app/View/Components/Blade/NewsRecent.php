<?php

namespace App\View\Components\Blade;

use App\Repositories\NewsRepository;
use Illuminate\View\Component;

class NewsRecent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(private NewsRepository $newsRepository)
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
        return view('components.blade.news-recent', [
            'news' => $this->newsRepository->recent(),
        ]);
    }
}
