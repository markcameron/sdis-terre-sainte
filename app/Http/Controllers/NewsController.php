<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    public function __construct(private NewsRepository $repository)
    {
    }

    public function index()
    {
        return view('site.news.index', [
            'news' => $this->repository->get(
                scopes: ['published' => null],
                orders: ['created_at' => 'DESC'],
                perPage: 12,
            ),
        ]);
    }

    public function show($slug)
    {
        $news = $this->repository->forSlug($slug);
        abort_unless($news, 404, 'News ');

        return view('site.news.show', [
            'news' => $news,
        ]);
    }
}
