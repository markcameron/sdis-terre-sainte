<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Form;
use Illuminate\Contracts\View\View;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;

class Title extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.title');
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()->name('title'),

            Select::make()
                ->name('type')
                ->options([
                    [
                        'value' => 1,
                        'label' => 'H1'
                    ],
                    [
                        'value' => 2,
                        'label' => 'H2'
                    ],
                    [
                        'value' => 3,
                        'label' => 'H3'
                    ],
                    [
                        'value' => 4,
                        'label' => 'H4'
                    ],
                    [
                        'value' => 5,
                        'label' => 'H5'
                    ],
                    [
                        'value' => 6,
                        'label' => 'H6'
                    ],
                ]),
        ]);
    }

    public static function getBlockIcon(): string
    {
        return 'wysiwyg_header-2';
    }
}
