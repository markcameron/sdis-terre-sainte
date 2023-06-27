@extends('layouts.site')

@section('content')
    {{-- <x-blade.homepage-hero></x-blade.homepage-hero>
    <x-blade.stats></x-blade.stats>
    <x-blade.news-recent></x-blade.news-recent>
    <x-blade.interventions></x-blade.interventions>
    <x-blade.emergency-numbers></x-blade.emergency-numbers> --}}

    <section class="grid md:grid-cols-2">
        <div class="relative" id="intervention-sectors">
            <h2
                class="text-primary font-barlowCondensed absolute inset-x-0 pt-4 text-center text-4xl uppercase sm:pt-8 sm:text-5xl">
                Notre secteur d'intervention
            </h2>
            <div>
              @include('svg/sectors_ts')
            </div>
        </div>
        <div class="relative">
            <h2
                class="font-barlowCondensed absolute inset-x-0 pt-4 text-center text-4xl uppercase text-white sm:pt-8 sm:text-5xl">
                Devenez Sapeur Pompier !</h2>
            <img src="{{ asset('images/recrutement-thumbnail.jpg') }}" class="w-full" alt="">
            <div class="absolute inset-x-0 bottom-0 mb-16 text-center">
                <a href="https://www.118-info.ch" target="_blank"
                    class="bg-primary hover:bg-primary-dark rounded-md px-4 py-3 text-xl font-bold text-white">118-info.ch</a>
            </div>
        </div>
    </section>
@endsection
