<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\Intervention;

class InterventionRepository extends ModuleRepository
{
    

    public function __construct(Intervention $model)
    {
        $this->model = $model;
    }
}
