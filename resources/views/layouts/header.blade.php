<nav x-data="{ open: false }" class="py-4 z-10 fixed w-full bg-transparent backdrop-blur-[2px] shadow-md h-24">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-16" src="{{ URL::asset('/icone.svg') }}" alt="">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="font-20 hidden space-x-8 md:-my-px md:ml-10 md:flex">
                    @if(Auth::check() == false)
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('benefit')" :active="request()->routeIs('benefit')">
                            {{ __('Benefícios') }}
                        </x-nav-link>
                        <x-nav-link :href="route('values')" :active="request()->routeIs('values')">
                            {{ __('Valores') }}
                        </x-nav-link>
                        <x-nav-link :href="route('doctors')" :active="request()->routeIs('doctors')">
                            {{ __('Médicos') }}
                        </x-nav-link>
                        <x-nav-link :href="route('contactUs')" :active="request()->routeIs('contactUs')">
                            {{ __('Contatos') }}
                        </x-nav-link>
                        <x-nav-link :href="route('sobreNos')" :active="request()->routeIs('sobreNos')">
                            {{ __('Sobre nós') }}
                        </x-nav-link>
                    @endif
                    @if(Auth::check())
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        @if( Auth::user()->role == 'admin')
                            <x-nav-link :href="route('areaadmin.index')" :active="request()->routeIs('areaadmin.index')">
                                {{ __('Admin') }}
                            </x-nav-link>
                        @endif
                        @if( Auth::user()->role == 'medico')
                            <x-nav-link :href="route('areamedico.index')" :active="request()->routeIs('areamedico.index')">
                                {{ __('Área médico') }}
                            </x-nav-link>
                        @endif
                        @if( Auth::user()->role == 'paciente')
                            <x-nav-link :href="route('areapaciente.index')" :active="request()->routeIs('areapaciente.index')">
                                {{ __('Área do paciente') }}
                            </x-nav-link>
                        @endif
                        {{-- 
                        <x-nav-link :href="route('medico.visual')" :active="request()->routeIs('medico.visual')">
                            {{ __('Ver médicos!') }}
                        </x-nav-link> --}}
                    @endif
                </div>
            </div>
             
            <div class="hidden md:flex md:items-center md:ml-6">
                <form action="{{ route('language') }}" method="POST">
                    @csrf
                    <select name="language" onchange="this.form.submit()" class="border rounded border-gray-400">
                        <option value="en" {{ session('language') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="pt-br" {{ session('language') == 'pt-br' ? 'selected' : '' }}>Português</option>
                        <option value="es" {{ session('language') == 'es' ? 'selected' : '' }}>Español</option>
                        <option value="de" {{ session('language') == 'de' ? 'selected' : '' }}>Germany</option>
                    </select>
                </form>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center md:ml-6">
                <x-switch-button></x-switch-button>
                @if(Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400  hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Sair') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open" class="mr-2 inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::check() == false)
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('benefit')" :active="request()->routeIs('benefit')">
                    {{ __('Benefícios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('values')" :active="request()->routeIs('values')">
                    {{ __('Valores') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('doctors')" :active="request()->routeIs('doctors')">
                    {{ __('Médicos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contactUs')" :active="request()->routeIs('contactUs')">
                    {{ __('Contatos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('aboutUs')" :active="request()->routeIs('aboutUs')">
                    {{ __('Sobre nós') }}
                </x-responsive-nav-link>
            @endif
            @if(Auth::check())
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                @if( Auth::user()->role == 'admin')
                    <x-responsive-nav-link :href="route('areaadmin.index')" :active="request()->routeIs('areaadmin.index')">
                        {{ __('Admin') }}
                    </x-responsive-nav-link>
                @endif
                @if( Auth::user()->role == 'medico')
                    <x-responsive-nav-link :href="route('areamedico.index')" :active="request()->routeIs('areamedico.index')">
                        {{ __('Área médico') }}
                    </x-responsive-nav-link>
                @endif
                @if( Auth::user()->role == 'paciente')
                    <x-responsive-nav-link :href="route('areapaciente.index')" :active="request()->routeIs('areapaciente.index')">
                        {{ __('Área do paciente') }}
                    </x-responsive-nav-link>
                @endif
                <x-responsive-nav-link :href="route('medico.visual')" :active="request()->routeIs('medico.visual')">
                    {{ __('Ver médicos!') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
