@extends('layouts.site')

@section('content')

<section class="container mx-auto my-24 px-4">
    <h2 class="text-primary font-barlowCondensed text-6xl uppercase">Interventions</h2>
    <table class="my-16 block">
        <thead class="sr-only">
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Commune</th>
                <th scope="col">Date</th>
            </tr>
        </thead>

            @php
            app()->setLocale('fr')
            @endphp
            @foreach ($interventions as $group => $monthInterventions)
            <thead>
                <tr>
                    <th colspan="4" class="flex w-full text-3xl text-primary pt-12 pb-8">{{ trans_choice(
                        '1 intervention en ' . \Carbon\Carbon::parse($group)->isoFormat('MMMM') . '|' . $monthInterventions->count() . ' interventions en ' . \Carbon\Carbon::parse($group)->isoFormat('MMMM'),
                        $monthInterventions->count()
                        ) }}
                    </th>
                </tr>
            </thead>
            <tbody class="block text-left text-lg border-t border-gray-200">
                @foreach ($monthInterventions as $group => $intervention)
                <tr class="flex flex-wrap border-b border-gray-200 py-4">
                    <th class="w-full lg:w-1/2 xl:w-1/3" scope="row">{{ $intervention->type }}</th>
                    <td class="w-full lg:w-1/2 xl:w-1/3">{{ $intervention->description }}</td>
                    <td class="w-1/2 lg:w-1/2 xl:w-1/6 xl:text-right">{{ $intervention->village }}</td>
                    <td class="w-1/2 text-right lg:w-1/2 lg:text-left xl:w-1/6 xl:text-right">{{ $intervention->date->tz('Europe/Zurich')->isoFormat('D MMMM YYYY, HH:mm') }}</td>
                </tr>
                @endforeach
                </tbody>
            @endforeach
        </tbody>
    </table>

</section>

@endsection
