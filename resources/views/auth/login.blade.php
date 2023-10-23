<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 flex align-center justify-center" :status="session('status')" />
    
    <!-- <a  href="/"><x-application-logo class="w-1/2" /></a> -->
    <form class="w-full flex justify-center items-center flex-col" method="POST" action="{{ route('login') }}">
    @csrf
        <h1 class="mx-1/6 font-bold text-2xl w-4/6 mb-5 dark:text-white">Entrar</h1>
        <!-- Email Address -->
        <div class="w-4/6">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="w-4/6 flex flex-col mt-2">
            <x-input-label for="password" :value="__('Senha')" />

            <div class="flex items-center bg-white border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-lg border">
                <input class="w-full dark:bg-gray-900 border-transparent focus:border-transparent focus:ring-0 rounded-md" 
                                id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password">
                <button type="button" id="PasswordButton" class="p-2"><img id="eye" src="eye.svg" alt="olhinho"></button>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>
        <div class="w-4/6 flex justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="ml-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif
        </div>
        <div class="flex items-center justify-end pt-10">
            <x-primary-button>
                {{ __('Entrar') }}
            </x-primary-button>
        </div>

        @php
            $caminhoGoogleLight = '/google_web/1x/btn_google_signin_light_normal_web.png';
        @endphp
    
        <div class="w-full grid p-16">
            <a class="m-auto" href="{{ url('auth/google') }}">
                <img src="{{ asset($caminhoGoogleLight)}}">
            </a>
        </div>

        <div class="border rounded-md border-zinc-200 p-5">
            <span class="dark:text-white">Novo por aqui?</span>
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Crie uma conta') }}
            </a>
        </div>
    </form>
</x-guest-layout>
