@extends('layouts.site')

@section('content')

<section class="container mx-auto my-24 px-4">
    <h2 class="text-primary font-barlowCondensed text-6xl uppercase">Actualités</h2>
    <ul class="my-16 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($news as $article)
            <li>
                <a href="{{ route('news.show', $article->slug) }}" class="group block">
                    <img src="{{ $article->image('cover', 'teaser', ['w' => 485, 'h' => 324]) }}" class="mb-4 h-auto w-full" alt="">
                    <h3 class="group-hover:text-primary text-3xl font-bold">{{ $article->title }}</h3>
                    <div class="mb-2 text-xl">{{ $article->created_at->isoFormat('D MMMM YYYY') }}</div>
                    <p class="mb-2 text-lg md:text-xl">{{ $article->teaser }}</p>
                    <div class="text-primary text-xl opacity-0 transition group-hover:opacity-100">lire la suite →</div>
                </a>
            </li>
        @endforeach
    </ul>

</section>

@endsection