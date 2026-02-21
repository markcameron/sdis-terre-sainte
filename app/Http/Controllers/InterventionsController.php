<?php

namespace App\Http\Controllers;

use App\Repositories\InterventionRepository;
use Illuminate\Http\Request;

class InterventionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, InterventionRepository $interventionRepository)
    {
        return view('site.interventions.index', [
            'interventions' => $interventionRepository->groupedByYear(),
        ]);
    }
}
