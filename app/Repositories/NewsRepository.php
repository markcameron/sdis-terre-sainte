<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\News;

class NewsRepository extends ModuleRepository
{
    use HandleBlocks;
    use HandleTranslations;
    use HandleSlugs;
    use HandleMedias;
    use HandleFiles;
    use HandleRevisions;
    use HandleNesting;

    public function __construct(News $model)
    {
        $this->model = $model;
    }
}
