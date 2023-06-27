<section class="container mx-auto my-24 px-4">
    <h2 class="text-primary font-barlowCondensed text-6xl uppercase">Interventions</h2>
    <table class="my-16 block border-t border-gray-200">
        <thead class="sr-only">
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Commune</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody class="block text-left text-lg">
            @foreach ($interventions as $intervention)
            <tr class="flex flex-wrap border-b border-gray-200 py-4">
                <th class="w-full lg:w-1/2 xl:w-1/3" scope="row">{{ $intervention->type }}</th>
                <td class="w-full lg:w-1/2 xl:w-1/3">{{ $intervention->description }}</td>
                <td class="w-1/2 lg:w-1/2 xl:w-1/6 xl:text-right">{{ $intervention->village }}</td>
                <td class="w-1/2 text-right lg:w-1/2 lg:text-left xl:w-1/6 xl:text-right">{{ $intervention->date->tz('Europe/Zurich')->isoFormat('D MMMM YYYY, HH:mm') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{ route('interventions.index')}}"
            class="bg-primary hover:bg-primary-dark rounded-md px-4 py-3 text-xl font-bold text-white">Voir toutes les
            interventions</a>
    </div>
</section>
