<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\EmergencyNumber;

class EmergencyNumberRepository extends ModuleRepository
{
    

    public function __construct(EmergencyNumber $model)
    {
        $this->model = $model;
    }
}
