<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 flex align-center justify-center" :status="session('status')" />
    
    <!-- <a  href="/"><x-application-logo class="w-1/2" /></a> -->
    <form class="w-full flex justify-center items-center flex-col" method="POST" action="{{ route('login') }}">
    @csrf
        <h1 class="mx-1/6 font-bold text-2xl w-4/6 mb-5">Entrar</h1>
        <!-- Email Address -->
        <div class="w-4/6">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="w-4/6 flex flex-col">
            <x-input-label for="password" :value="__('Senha')" />

            <div class="flex gap-2 items-center">
                <x-text-input class="block mt-1 w-full" id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                                <button type="button" id="PasswordButton"><img id="eye" src="eye.svg" alt="olhinho"></button>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Não está registrado?') }}
            </a>
            @if (Route::has('password.request'))
                <a class="ml-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif
        </div>
        @php
            $caminhoGoogleLight = '/google_web/1x/btn_google_signin_light_normal_web.png';
            $caminhoGoogleDark = '/google_web/1x/btn_google_signin_dark_normal_web.png';
        @endphp
    
            <br>
        <a href="{{ url('auth/google') }}">
            <img src="{{ asset($caminhoGoogleLight)}}">
        </a><br>
        <div class="flex items-center justify-end mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Manter conectado') }}</span>
            </label>
            
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
