<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Form;
use Illuminate\Contracts\View\View;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;

class Imagegrid extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.imagegrid');
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

            Medias::make()
                ->name('image')
                ->max(24),
        ]);
    }

    public static function getBlockIcon(): string
    {
        return 'fix-grid';
    }
}
