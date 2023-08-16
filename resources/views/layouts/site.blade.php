<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SDIS | Bienvenue</title>

    <link rel="shortcut icon" href="/images/favicon.png">
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Matomo -->
    <script>
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
        var u="//matomo.kram.xyz/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->
</head>

<body>
    <header>
        <div x-data="{ isOpen: false, dropdownIsOpen: false }" class="relative bg-black text-white">
            <!-- ----------- -->
            <!-- desktop nav -->
            <!-- ----------- -->
            <div class="mx-auto max-w-7xl px-6">
                <div class="flex items-center justify-between py-6 md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="{{ route('homepage') }}">
                            <span class="sr-only">SDIS Terre Sainte</span>
                            <img src="{{ asset('images/sdis-logo.svg') }}" class="h-10 w-auto md:h-12 lg:h-16" alt="">
                        </a>
                    </div>
                    <div class="-my-2 -mr-2 lg:hidden">
                        <button @click="isOpen = !isOpen" type="button"
                            class="inline-flex items-center justify-center rounded-sm p-2 text-white hover:bg-opacity-75"
                            aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                    <nav class="hidden space-x-10 lg:flex">
                        <x-blade.menu></x-blade.menu>
                    </nav>
                </div>
            </div>
            <!-- ----------- -->
            <!-- mobile nav -->
            <!-- ----------- -->
            <div x-show="isOpen" x-transition:enter="duration-200 ease-out"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute inset-x-0 top-0 origin-top-right transform p-1 transition lg:hidden">
                <div class="divide-y-2 rounded-sm bg-black">
                    <div class="px-5 pt-5 pb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <img class="h-10 w-auto md:h-12" src="{{ asset('images/sdis-logo.svg') }}" alt="SDIS Terre Sainte">
                            </div>
                            <div>
                                <button @click="isOpen = !isOpen" type="button"
                                    class="inline-flex items-center justify-center rounded-sm p-2 text-white hover:bg-opacity-75">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mt-6">
                            <nav class="flex flex-col">
                                <x-blade.menu type="mobile"></x-blade.menu>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <x-blade.footer></x-blade.footer>
</body>

</html>
