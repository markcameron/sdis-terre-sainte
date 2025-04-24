<?php

namespace App\View\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class Text extends TwillBlockComponent
{
    public function render(): View
    {
        return view('components.twill.blocks.text');
    }

    public function getForm(): Form
    {
        return Form::make([
            Wysiwyg::make()
                ->name('text')
                ->toolbarOptions([
                    ['header' => [2, 3, 4, 5, 6, false]],
                    'align',
                    'bold',
                    'italic',
                    // 'underline',
                    // 'strike',
                    'blockquote',
                    "code-block",
                    'ordered',
                    'bullet',
                    'hr',
                    'code',
                    'link',
                    'clean',
                    'table',
                ])
        ]);
    }
}
