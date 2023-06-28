<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PageRepository;

class PagesController extends Controller
{
    public function __construct(private PageRepository $repository)
    {
    }

    public function show($slug)
    {
        $page = $this->repository->forSlug($slug);
        abort_unless($page, 404, 'Page ');

        return view('site.pages.show', [
            'page' => $page,
        ]);
    }
}
