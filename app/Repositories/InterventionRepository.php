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

    public function recent()
    {
        return $this->model
            ->published()
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
    }

    public function groupedByMonthForYear(string $year)
    {
        return $this->model
            ->published()
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(fn ($row) => $row->date->format('Y-m'));
    }
}
