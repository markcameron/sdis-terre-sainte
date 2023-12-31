<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Page;

class PageRepository extends ModuleRepository
{
    use HandleBlocks;
    use HandleSlugs;
    use HandleRevisions;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
