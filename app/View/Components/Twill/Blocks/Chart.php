<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Chart extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.chart');
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()
                ->name('config')
                ->type('textarea')
                ->rows(10)
        ]);
    }

    public static function getBlockIcon(): string
    {
        return 'b-activity';
    }
}
