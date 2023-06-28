<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DocumentRepository;

class DocumentsController extends Controller
{
    public function __construct(private DocumentRepository $repository)
    {
    }

    public function index(Request $request)
    {
        return view('site.documents.index', [
            'documents' => $this->repository->get(),
        ]);
    }
}
