<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\DatePicker;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class InterventionController extends BaseModuleController
{
    protected $moduleName = 'interventions';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form
            ->add(Input::make()->name('type')->label('Type')->maxLength(100))
            ->add(Input::make()->name('description')->label('Description')->maxLength(100))
            ->add(DatePicker::make()->name('date')->label('Date')->time24h()->altFormat('l j F Y - H:i')->minuteIncrement(1))
            ->add(Select::make()
                ->name('village')
                ->unpack()
                ->columns(3)
                ->required()
                ->options(
                    Options::make([
                        Option::make('Bogis-Bossey', 'Bogis-Bossey'),
                        Option::make('Céligny', 'Céligny'),
                        Option::make('Chavannes-de-Bogis', 'Chavannes-de-Bogis'),
                        Option::make('Chavannes-des-Bois', 'Chavannes-des-Bois'),
                        Option::make('Commugny', 'Commugny'),
                        Option::make('Coppet', 'Coppet'),
                        Option::make('Founex', 'Founex'),
                        Option::make('Mies', 'Mies'),
                        Option::make('Tannay', 'Tannay'),
                    ])
                ))
            ;

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }
}
