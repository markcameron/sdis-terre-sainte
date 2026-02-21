@extends('layouts.site')

@section('content')

<section class="container mx-auto my-24 px-4">
    <h2 class="text-primary font-barlowCondensed text-6xl uppercase">Interventions</h2>

    @php
    app()->setLocale('fr');
    $years = $interventions->keys()->toArray();
    $firstYear = $years[0] ?? null;
    @endphp

    <div x-data="{ activeTab: '{{ $firstYear }}' }">
        <div class="my-8 flex flex-wrap gap-2 border-b border-gray-200">
            @foreach ($interventions as $year => $months)
            @php $totalCount = $months->flatten()->count(); @endphp
            <button
                @click="activeTab = '{{ $year }}'; $el.parentElement.querySelectorAll('button').forEach(b => { b.classList.remove('text-primary', 'border-primary', 'border-b-2'); b.classList.add('text-gray-500') }); $el.classList.add('text-primary', 'border-primary', 'border-b-2'); $el.classList.remove('text-gray-500')"
                class="px-4 py-2 text-lg transition-colors border-b-2 border-transparent"
                :class="activeTab === '{{ $year }}' ? 'text-primary border-primary border-b-2' : 'text-gray-500'"
            >
                {{ $year }} ({{ $totalCount }} interventions)
            </button>
            @endforeach
        </div>

        @foreach ($interventions as $year => $months)
        <div x-show="activeTab === '{{ $year }}'" x-cloak>
            <table class="my-16 w-full">
                <thead class="sr-only">
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Commune</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>

                @foreach ($months as $group => $monthInterventions)
                <thead>
                    <tr>
                        <th colspan="4" class="w-full text-3xl text-primary text-left pt-12 pb-8">{{ trans_choice(
                            '1 intervention en ' . \Carbon\Carbon::parse($group)->isoFormat('MMMM') . '|' . $monthInterventions->count() . ' interventions en ' . \Carbon\Carbon::parse($group)->isoFormat('MMMM'),
                            $monthInterventions->count()
                            ) }}
                        </th>
                    </tr>
                </thead>
                <tbody class="text-left text-lg border-t border-gray-200">
                    @foreach ($monthInterventions as $intervention)
                    <tr class="flex border-b border-gray-200 py-4">
                        <th class="w-full lg:w-1/2 xl:w-1/3" scope="row">{{ $intervention->type }}</th>
                        <td class="w-full lg:w-1/2 xl:w-1/3">{{ $intervention->description }}</td>
                        <td class="w-1/2 lg:w-1/2 xl:w-1/6 xl:text-right">{{ $intervention->village }}</td>
                        <td class="w-1/2 text-right lg:w-1/2 lg:text-left xl:w-1/6 xl:text-right">{{ $intervention->date->tz('Europe/Zurich')->isoFormat('D MMMM YYYY, HH:mm') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                @endforeach
            </table>
        </div>
        @endforeach
    </div>

</section>

@endsection
