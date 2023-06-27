<section class="bg-primary font-barlowCondensed px-4 py-16 text-white">
    <h2 class="mb-10 text-center text-4xl lg:mb-16">En cas d'Urgences</h2>
    <div class="mx-auto max-w-7xl">
        <ul class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:text-center lg:grid-cols-4">
            @foreach ($numbers as $number)
                <li class="">
                    <div class="flex flex-col items-center text-2xl">
                        <span class="text-6xl xl:text-8xl">{{ $number->title }}</span>
                        <span class="font-sans font-bold">{{ $number->description }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
