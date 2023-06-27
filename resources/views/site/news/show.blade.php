@extends('layouts.site')

@section('content')
    @php
        $image = $news->imageAsArray('cover', 'default', ['w' => 992]);
    @endphp

    <div class="container max-w-5xl px-4 pb-12 mx-auto">
        <div class="page-content">
            <img src="{{ $image['src'] }}" class="w-full h-auto py-12" alt="{{ $image['alt'] }}" title="{{ $image['caption'] }}">

            <section class="container mx-auto mb-4">
                <h1 class="text-primary text-6xl font-barlowCondensed uppercase">{{ $news->title }}</h1>
            </section>

            <div class="page-content">
                <p class="font-semibold">{{ $news->teaser }}</p>

                {!! $news->renderBlocks() !!}
            </div>
        </div>
    </div>

@endsection
