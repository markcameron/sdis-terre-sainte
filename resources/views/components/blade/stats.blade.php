<section class="bg-secondary px-4 py-16">
    <div class="mx-auto max-w-7xl">
        <ul class="grid gap-4 text-white sm:grid-cols-2 md:grid-cols-3 md:text-center">
            <li class="flex items-center xs:ml-12 gap-4 sm:gap-6 md:flex-col">
                <div class="flex justify-center w-1/2">
                    <img src="{{ asset('images/alarm.svg') }}" class="w-full max-w-[100px] sm:max-w-[150px] xl:max-w-[200px]" alt="">
                </div>
                <div class="flex w-1/2 font-barlowCondensed flex flex-col text-2xl md:items-center xl:text-5xl">
                    <span class="text-5xl xl:text-8xl">{{ $interventionCount }}</span>
                    <span>Interventions en {{ now()->year }}</span>
                </div>
            </li>
            @foreach ($stats as $stat)
                <li class="flex items-center xs:ml-12 gap-4 sm:gap-6 md:flex-col">
                    <div class="flex justify-center w-1/2">
                        <img src="{{ $stat->image('icon') }}" class="w-full max-w-[100px] sm:max-w-[150px] xl:max-w-[200px]" alt="">
                    </div>
                    <div class="flex w-1/2 font-barlowCondensed flex flex-col text-2xl md:items-center xl:text-5xl">
                        <span class="text-5xl xl:text-8xl">{{ $stat->description }}</span>
                        <span>{{ $stat->title }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
