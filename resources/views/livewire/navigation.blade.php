<header x-data="dropdown" class="bg-gray-800 sticky top-0 z-50">

    <div class=" container flex items-center h-16
    justify-between md:justify-start">
        <a x-on:click="show" :class='{"bg-opacity-100 text-orange-500" : open}'
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-bold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />

            </svg>
            <span class="text-sm hidden md:block">Categorias</span>
        </a>

        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>

        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>


        <div class="mx-6 relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="text-white" fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd" />
                            </svg>
                        </i>
                    </x-slot>

                    <x-slot name="content">

                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>

                    </x-slot>
                </x-jet-dropdown>
            @endauth

        </div>
        <div class="hidden md:block">
            @livewire('cart')
        </div>


    </div>

    <nav x-show='open' id='navigation-menu' class="bg-gray-700 bg-opacity-25 w-full absolute">
        <!--menu pc-->
        <div class="container h-full hidden md:block">
            <div x-on:click.away='close' class="grid grid-cols-4 h-full relative ">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-gray-600 hover:bg-orange-500 hover:text-white">
                            <a class="py-2 px-4 text-sm flex items-center"
                                href="{{ route('categories.show', $category) }}">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>

                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 top-0 right-0 h-full hidden">
                                <x-navigation-subcategories :category='$category' />
                            </div>

                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category='$categories->first()' />
                </div>
            </div>
        </div>
        <!-- Menu movil-->
        <div class="bg-white h-full overflow-y-auto">

            <div class="container bg-gray-200 py-3 mb-1">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-gray-600 hover:bg-orange-500 hover:text-white">
                        <a class="py-2 px-4 text-sm flex items-center"
                            href="{{ route('categories.show', $category) }}">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="text-gray-500 px-6 my-2">USUARIOS</p>
            @livewire('cart-mobile')
            @auth
                <a class="py-2 px-4 text-sm flex items-center text-gray-600 hover:bg-orange-500 hover:text-white"
                    href="{{ route('profile.show') }}">
                    <span class="flex justify-center w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Perfil
                </a>
                <a onclick='event.preventDefault();document.getElementById("logout-form").submit()'
                    class="py-2 px-4 text-sm flex items-center text-gray-600 hover:bg-orange-500 hover:text-white" href="">
                    <span class="flex justify-center w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Cerrar sesión
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            @else
                <a class="py-2 px-4 text-sm flex items-center text-gray-600 hover:bg-orange-500 hover:text-white"
                    href="{{ route('login') }}">
                    <span class="flex justify-center w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Iniciar sesión
                </a>
                <a class="py-2 px-4 text-sm flex items-center text-gray-600 hover:bg-orange-500 hover:text-white"
                    href="{{ route('register') }}">
                    <span class="flex justify-center w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.625 2.655A9 9 0 0119 11a1 1 0 11-2 0 7 7 0 00-9.625-6.492 1 1 0 11-.75-1.853zM4.662 4.959A1 1 0 014.75 6.37 6.97 6.97 0 003 11a1 1 0 11-2 0 8.97 8.97 0 012.25-5.953 1 1 0 011.412-.088z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M5 11a5 5 0 1110 0 1 1 0 11-2 0 3 3 0 10-6 0c0 1.677-.345 3.276-.968 4.729a1 1 0 11-1.838-.789A9.964 9.964 0 005 11zm8.921 2.012a1 1 0 01.831 1.145 19.86 19.86 0 01-.545 2.436 1 1 0 11-1.92-.558c.207-.713.371-1.445.49-2.192a1 1 0 011.144-.83z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M10 10a1 1 0 011 1c0 2.236-.46 4.368-1.29 6.304a1 1 0 01-1.838-.789A13.952 13.952 0 009 11a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Registrarse
                </a>
            @endauth

        </div>
    </nav>

</header>
