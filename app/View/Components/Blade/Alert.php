<?php

namespace App\View\Components\Blade;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $type = 'success',
        public $class = '',
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blade.alert', [
            'class' => $this->class,
            'backgroundColor' => $this->alertBackgroundColor(),
            'foregroundColor' => $this->alertForegroundColor(),
            'icon' => $this->icon(),
        ]);
    }

    private function alertBackgroundColor(): string
    {
        return match ($this->type) {
            'success' => 'bg-green-50',
            'danger' => 'bg-red-50',
            default => 'bg-green-50',
        };
    }

    private function alertForegroundColor(): string
    {
        return match ($this->type) {
            'success' => 'text-green-500',
            'danger' => 'text-red-500',
            default => 'text-green-500',
        };
    }

    private function icon(): string
    {
        return match ($this->type) {
            'success' => '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />',
            'danger' => '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />',
            default => '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />',
        };
    }
}
