@extends('layouts.site')

@section('content')

<div class="container max-w-5xl px-4 pb-12 mx-auto">
    <div class="page-content">
        <article>
            {!! $page->renderBlocks() !!}
        </article>
    </div>
</div>

@endsection
