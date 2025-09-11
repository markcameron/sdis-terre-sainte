<footer class="bg-black" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-4 sm:pt-24 lg:px-8 lg:pt-32">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">

            <div class="mt-10 xl:mt-0">
                <h3 class="text-md font-semibold leading-6 text-gray-100">Contact</h3>
                <address class="my-8 grid items-start gap-6 text-lg not-italic sm:grid-cols-2 lg:grid-cols-1">
                    <div class="flex items-start gap-6">
                        <svg class="h-auto w-6 text-primary" viewBox="0 0 29 40" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.01 39.193C2.037 22.737 0 21.048 0 15 0 6.716 6.492 0 14.5 0S29 6.716 29 15c0 6.048-2.037 7.737-13.01 24.193a1.78 1.78 0 01-2.98 0zM14.5 21.25c3.337 0 6.042-2.798 6.042-6.25S17.837 8.75 14.5 8.75c-3.337 0-6.042 2.798-6.042 6.25s2.705 6.25 6.042 6.25z">
                            </path>
                        </svg>
                        <span class="text-gray-50">{!! $address !!}</span>
                    </div>
                    <div class="flex items-center gap-6">
                        <svg class="h-auto w-6 text-primary" viewBox="0 0 40 40" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M38.86 28.265l-8.75-3.75a1.874 1.874 0 00-2.188.54l-3.875 4.734a28.959 28.959 0 01-13.844-13.843l4.735-3.875a1.87 1.87 0 00.539-2.188l-3.75-8.75A1.888 1.888 0 009.578.047L1.453 1.922A1.875 1.875 0 000 3.749C0 23.79 16.242 40 36.25 40a1.875 1.875 0 001.829-1.453l1.875-8.125a1.898 1.898 0 00-1.095-2.157z">
                            </path>
                        </svg>
                        <a href="tel:{{ $telephoneLink }}" class="text-gray-50 hover:text-gray-50">{{ $telephone }}</a>
                    </div>
                    <div class="flex items-center gap-6">
                        <svg class="h-auto w-6 text-primary" viewBox="0 0 40 30" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M39.242 9.906a.47.47 0 01.758.367V26.25c0 2.07-1.68 3.75-3.75 3.75H3.75C1.68 30 0 28.32 0 26.25V10.281c0-.39.445-.61.758-.367 1.75 1.36 4.07 3.086 12.039 8.875 1.648 1.203 4.43 3.734 7.203 3.719 2.79.023 5.625-2.563 7.21-3.719C35.18 13 37.493 11.266 39.243 9.906zM20 20c1.813.031 4.422-2.281 5.734-3.234C36.102 9.242 36.891 8.586 39.281 6.71A1.87 1.87 0 0040 5.234V3.75C40 1.68 38.32 0 36.25 0H3.75C1.68 0 0 1.68 0 3.75v1.484c0 .579.266 1.118.719 1.477 2.39 1.867 3.18 2.531 13.547 10.055C15.578 17.719 18.187 20.03 20 20z">
                            </path>
                        </svg>
                        <a href="mailto:{{ $email }}"
                            class="text-gray-50 hover:text-gray-50">{{ $email }}</a>
                    </div>
                </address>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:col-span-2">

                <div class="">
                    <h3 class="text-sm font-semibold leading-6 text-gray-100">Liens</h3>
                    <ul role="list" class="mt-6 space-y-4">
                        <li>
                            <a href="https://www.eca-vaud.ch/"
                                class="text-sm leading-6 text-gray-50 hover:text-gray-100">Etablissement cantonal
                                d'assurances (ECA)</a>
                        </li>
                        <li>
                            <a href="https://www.fvsp.ch/"
                                class="text-sm leading-6 text-gray-50 hover:text-gray-100">Fédération vaudoise des
                                sapeurs-pompiers (FVSP)</a>
                        </li>
                        <li>
                            <a href="https://www.swissfire.ch/home-fr"
                                class="text-sm leading-6 text-gray-50 hover:text-gray-100">Fédération suisse des
                                sapeurs-pompiers (FSSP)</a>
                        </li>
                        <li>
                            <a href="https://www.sdis-nyon-dole.ch/"
                                class="text-sm leading-6 text-gray-50 hover:text-gray-100">SDIS Nyon-Dôle</a>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-1 gap-8 xl:text-right">
                    <div>
                        <h3 class="text-md font-semibold leading-6 text-gray-100">Outils</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="https://mir.sdis-ts.ch"
                                    class="text-sm leading-6 text-gray-50 hover:text-gray-100">MIR</a>
                            </li>
                            <li>
                                <a href="https://storage.118-vaud.ch/login"
                                    class="text-sm leading-6 text-gray-50 hover:text-gray-100">ECABOX</a>
                            </li>
                            <li>
                                <a href="https://webeasy.infodev.ch/665/"
                                    class="text-sm leading-6 text-gray-50 hover:text-gray-100">ECAWIN</a>
                            </li>
                            <li>
                                <a href="https://map.cartolacote.ch/theme/eau_potable?lang=fr&tree_group_layers_points_interet=&tree_group_layers_lieux_geographiques=&baselayer_ref=plan_cadastral&baselayer_opacity=0&theme=eau_potable&map_x=2503834&map_y=1131535&map_zoom=2&tree_group_layers_eau_potable_esp=eau_hydrants_eca&tree_groups=eau_potable_esp"
                                    class="text-sm leading-6 text-gray-50 hover:text-gray-100">Cartolacôte</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div
            class="mt-16 border-t border-gray-100/10 pt-8 sm:mt-20 md:flex md:items-center md:justify-between lg:mt-24">
            <div class="flex space-x-6 md:order-2">

                <a href="{{ $instagramUrl }}" class="text-gray-400 hover:text-gray-500"
                    target="_blank">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M11.0043 6.05879C8.27153 6.05879 6.06724 8.26308 6.06724 10.9959C6.06724 13.7287 8.27153 15.933 11.0043 15.933C13.7372 15.933 15.9415 13.7287 15.9415 10.9959C15.9415 8.26308 13.7372 6.05879 11.0043 6.05879ZM11.0043 14.2057C9.23833 14.2057 7.79458 12.7662 7.79458 10.9959C7.79458 9.22558 9.23403 7.78613 11.0043 7.78613C12.7747 7.78613 14.2141 9.22558 14.2141 10.9959C14.2141 12.7662 12.7704 14.2057 11.0043 14.2057ZM17.295 5.85683C17.295 6.49707 16.7793 7.0084 16.1434 7.0084C15.5032 7.0084 14.9918 6.49277 14.9918 5.85683C14.9918 5.2209 15.5075 4.70527 16.1434 4.70527C16.7793 4.70527 17.295 5.2209 17.295 5.85683ZM20.5649 7.02558C20.4918 5.48301 20.1395 4.1166 19.0094 2.99082C17.8836 1.86504 16.5172 1.5127 14.9747 1.43535C13.3848 1.34512 8.61958 1.34512 7.02974 1.43535C5.49146 1.5084 4.12505 1.86074 2.99497 2.98652C1.86489 4.1123 1.51685 5.47871 1.4395 7.02129C1.34927 8.61113 1.34927 13.3764 1.4395 14.9662C1.51255 16.5088 1.86489 17.8752 2.99497 19.001C4.12505 20.1268 5.48716 20.4791 7.02974 20.5564C8.61958 20.6467 13.3848 20.6467 14.9747 20.5564C16.5172 20.4834 17.8836 20.1311 19.0094 19.001C20.1352 17.8752 20.4875 16.5088 20.5649 14.9662C20.6551 13.3764 20.6551 8.61543 20.5649 7.02558ZM18.511 16.6721C18.1758 17.5143 17.527 18.1631 16.6805 18.5025C15.4129 19.0053 12.4051 18.8893 11.0043 18.8893C9.60356 18.8893 6.59145 19.001 5.32817 18.5025C4.48599 18.1674 3.83716 17.5186 3.49771 16.6721C2.99497 15.4045 3.11099 12.3967 3.11099 10.9959C3.11099 9.59511 2.99927 6.58301 3.49771 5.31973C3.83286 4.47754 4.48169 3.82871 5.32817 3.48926C6.59575 2.98652 9.60356 3.10254 11.0043 3.10254C12.4051 3.10254 15.4172 2.99082 16.6805 3.48926C17.5227 3.82441 18.1715 4.47324 18.511 5.31973C19.0137 6.5873 18.8977 9.59511 18.8977 10.9959C18.8977 12.3967 19.0137 15.4088 18.511 16.6721Z" />
                    </svg>
                </a>

                <a href="{{ $facebookUrl }}" class="text-gray-400 hover:text-gray-500"
                    target="_blank">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="{{ $githubUrl }}" class="text-gray-400 hover:text-gray-500"
                    target="_blank">
                    <span class="sr-only">GitHub</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-xs leading-5 text-gray-500 md:order-1 md:mt-0">&copy; {{ date('Y') }} SDIS Terre Sainte &mdash; Webdesign <a href="https://www.devfactory.ch" target="_blank">DevFactory</a>.</p>
        </div>
    </div>
</footer>
