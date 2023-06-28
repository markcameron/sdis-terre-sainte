@extends('layouts.site')

@section('content')
    <div class="container mx-auto mt-16 max-w-5xl px-4 pb-12">
        <h1 class="font-barlowCondensed text-4xl uppercase text-primary lg:text-5xl">Documents utiles</h1>
        <ul class="my-16 border-t border-gray-200 sm:text-xl">
            @foreach ($documents as $document)
                <li class="border-b border-gray-200">
                    <a href="{{ $document->file('document') }}" class="hover flex items-center gap-x-4 py-4 hover:text-primary sm:gap-x-12" download>
                        <svg class="h-8 sm:h-10" viewBox="0 0 42 55" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.031 24.063a1.719 1.719 0 000 3.437H29.22a1.719 1.719 0 000-3.438H12.03zm-1.719 8.593a1.719 1.719 0 011.72-1.718h17.187a1.719 1.719 0 010 3.437H12.03a1.719 1.719 0 01-1.719-1.719zm0 6.875a1.719 1.719 0 011.72-1.718h6.874a1.719 1.719 0 110 3.437h-6.875a1.719 1.719 0 01-1.719-1.719z" />
                            <path
                                d="M25.781 0H6.875A6.875 6.875 0 000 6.875v41.25A6.875 6.875 0 006.875 55h27.5a6.875 6.875 0 006.875-6.875V15.469L25.781 0zm0 3.438v6.874a5.157 5.157 0 005.157 5.157h6.875v32.656a3.438 3.438 0 01-3.438 3.438h-27.5a3.438 3.438 0 01-3.438-3.438V6.875a3.437 3.437 0 013.438-3.438h18.906z" />
                        </svg>
                        <span class="flex-1 font-bold">{{ $document->title }}</span>
                        <svg class="h-6 sm:h-8" viewBox="0 0 44 38" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.359 24.19a1.359 1.359 0 011.36 1.36v6.795a2.718 2.718 0 002.717 2.718h32.617a2.718 2.718 0 002.718-2.718V25.55a1.359 1.359 0 112.718 0v6.795a5.436 5.436 0 01-5.436 5.436H5.436A5.436 5.436 0 010 32.345V25.55a1.359 1.359 0 011.359-1.36z" />
                            <path
                                d="M20.782 29.502a1.36 1.36 0 001.925 0l8.154-8.154a1.36 1.36 0 10-1.925-1.925l-5.832 5.836V1.36a1.36 1.36 0 00-2.719 0v23.9l-5.833-5.836a1.36 1.36 0 10-1.924 1.925l8.154 8.154z" />
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
