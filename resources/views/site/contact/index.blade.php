@extends('layouts.site')

@section('content')
    <div class="container mx-auto my-16 max-w-7xl px-4">
        <div class="items-start gap-24 lg:flex">

            <div class="xl:1/3 mb-16 lg:w-1/2">
                <h1 class="mb-8 font-barlowCondensed text-5xl uppercase text-primary">Contactez-nous</h1>
                <p class="text-lg">Vous avez des question ou des remarques concernant le SDIS Terre-Sainte ? Nous sommes à
                    votre disposition pour répondre à vos sollicitations. Utilisez le formulaire ci-contre pour nous
                    contacter.</p>
                <address class="my-8 grid items-start gap-6 text-lg not-italic sm:grid-cols-2 lg:grid-cols-1">
                    <div class="flex items-start gap-6">
                        <svg class="h-auto w-6 text-primary" viewBox="0 0 29 40" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.01 39.193C2.037 22.737 0 21.048 0 15 0 6.716 6.492 0 14.5 0S29 6.716 29 15c0 6.048-2.037 7.737-13.01 24.193a1.78 1.78 0 01-2.98 0zM14.5 21.25c3.337 0 6.042-2.798 6.042-6.25S17.837 8.75 14.5 8.75c-3.337 0-6.042 2.798-6.042 6.25s2.705 6.25 6.042 6.25z" />
                        </svg>
                        <span>
                            SDIS Terre-Sainte<br>
                            Chemin Balessert 1<br>
                            1297 Founex
                        </span>
                    </div>
                    <div class="flex items-center gap-6">
                        <svg class="h-auto w-6 text-primary" viewBox="0 0 40 40" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M38.86 28.265l-8.75-3.75a1.874 1.874 0 00-2.188.54l-3.875 4.734a28.959 28.959 0 01-13.844-13.843l4.735-3.875a1.87 1.87 0 00.539-2.188l-3.75-8.75A1.888 1.888 0 009.578.047L1.453 1.922A1.875 1.875 0 000 3.749C0 23.79 16.242 40 36.25 40a1.875 1.875 0 001.829-1.453l1.875-8.125a1.898 1.898 0 00-1.095-2.157z" />
                        </svg>
                        <a href="tel:+0229609620" class="hover:text-primary">022 960 96 20</a>
                    </div>
                    <div class="flex items-center gap-6">
                        <svg class="h-auto w-6 text-primary" viewBox="0 0 40 30" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M39.242 9.906a.47.47 0 01.758.367V26.25c0 2.07-1.68 3.75-3.75 3.75H3.75C1.68 30 0 28.32 0 26.25V10.281c0-.39.445-.61.758-.367 1.75 1.36 4.07 3.086 12.039 8.875 1.648 1.203 4.43 3.734 7.203 3.719 2.79.023 5.625-2.563 7.21-3.719C35.18 13 37.493 11.266 39.243 9.906zM20 20c1.813.031 4.422-2.281 5.734-3.234C36.102 9.242 36.891 8.586 39.281 6.71A1.87 1.87 0 0040 5.234V3.75C40 1.68 38.32 0 36.25 0H3.75C1.68 0 0 1.68 0 3.75v1.484c0 .579.266 1.118.719 1.477 2.39 1.867 3.18 2.531 13.547 10.055C15.578 17.719 18.187 20.03 20 20z" />
                        </svg>
                        <a href="mailto:info@sdis-ts.ch" class="hover:text-primary">info@sdis-ts.ch</a>
                    </div>
                </address>
            </div>

            <form action="{{ route('contact.submit') }}" method="POST" class="mb-16 lg:w-1/2 xl:w-2/3">
                @if ($errors)
                    <x-alert>
                        <h3 class="text-sm font-medium text-red-800">Vous avez des erreurs dans votre soumission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul role="list" class="list-disc space-y-1 pl-5">
                                @foreach ($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </x-alert>
                @endif

                @csrf
                <div class="mb-6 grid gap-6">
                    <div class="">
                        <label for="firstName" class="block text-lg">Nom</label>
                        <div class="mt-1">
                            <input type="text" name="first_name" id="firstName"
                                class="block w-full border border-gray-300 p-2 text-lg shadow-sm" placeholder="Nom">
                        </div>
                    </div>
                    <div class="">
                        <label for="firstName" class="block text-lg">Prénom</label>
                        <div class="mt-1">
                            <input type="text" name="last_name" id="firstName"
                                class="block w-full border border-gray-300 p-2 text-lg shadow-sm" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label for="email" class="block text-lg">email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                class="block w-full border border-gray-300 p-2 text-lg shadow-sm" placeholder="Email">
                        </div>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1 xl:col-span-2">
                        <label for="message" class="block text-lg">message</label>
                        <div class="mt-1">
                            <textarea name="message" id="message" cols="30" rows="10"
                                class="block w-full border border-gray-300 p-2 text-lg shadow-sm" placeholder="Message"></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Envoyer"
                    class="rounded-md bg-primary px-12 py-3 text-xl font-bold text-white hover:bg-primary-dark">
            </form>
        </div>
    </div>
@endsection
