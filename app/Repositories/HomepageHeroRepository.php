<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\HomepageHero;

class HomepageHeroRepository extends ModuleRepository
{
    use HandleMedias;

    public function __construct(HomepageHero $model)
    {
        $this->model = $model;
    }
}
