<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Form;
use Illuminate\Contracts\View\View;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\InlineRepeater;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;

class Icongrid extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.icongrid');
    }

    public function getForm(): Form
    {
        return Form::make([
            Select::make()
                ->name('columns')
                ->label('Colonnes')
                ->default(1)
                ->options(
                    Options::make([
                        Option::make(1, '1'),
                        Option::make(2, '2'),
                        Option::make(3, '3'),
                        Option::make(4, '4'),
                        Option::make(6, '6'),
                    ])
                ),

            InlineRepeater::make()->name('icon-block')
                ->fields([
                    Input::make()->name('icon'),
                    Input::make()->name('icon-color')->default('black'),
                    Select::make()->name('icon-rotate')
                        ->default('rotate-0')
                        ->options([
                            Option::make('rotate-0', '0°'),
                            Option::make('rotate-45', '45°'),
                            Option::make('rotate-90', '90°'),
                            Option::make('rotate-180', '180°'),
                        ]),
                    Input::make()->name('title'),
                    Input::make()->name('title-color')->default('black'),
                    Input::make()->type('textarea')->rows(3)->name('body'),
                ]),
        ]);
    }

    public static function getBlockIcon(): string
    {
        return 'b-grid';
    }
}
