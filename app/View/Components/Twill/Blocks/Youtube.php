<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Form;
use Illuminate\Contracts\View\View;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;

class Youtube extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.youtube');
    }

    public function getForm(): Form
    {
        return Form::make([
            Input::make()->name('youtube_id')->label('Lien partageable YouTube'),
        ]);
    }

    public static function getBlockIcon(): string
    {
        return 'video';
    }
}
