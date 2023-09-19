<?php

namespace App\Http\Controllers;

use App\Services\InterventionService;
use Illuminate\Http\Request;

class ImportsController extends Controller
{
    public function index(Request $request)
    {
        return view('import_interventions');
    }

    public function submit(Request $request, InterventionService $interventionService)
    {

        $json = json_decode($request->file('json')->getContent());
        $interventions = collect($json->interventions);
        $interventions->each(fn ($intervention) => $interventionService->createFromJson($intervention->message, $intervention->date));
        dd($interventions);

        dd($request);
    }
}
