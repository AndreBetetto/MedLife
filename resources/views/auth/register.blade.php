<x-guest-layout>
    <form method="POST" class="flex flex-col items-center justify center" action="{{ route('register') }}">
        @csrf
        <h1 class="mx-1/6 font-bold text-2xl w-4/6 mb-5 dark:text-white">Registrar</h1>
        <!-- Name -->
        <div class="w-4/6">
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 w-4/6">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 w-4/6 flex flex-col">
            <x-input-label for="password" :value="__('Senha')" />

            <div class="flex items-center bg-white border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-lg border">
                <input class="w-full border-transparent focus:border-transparent focus:ring-0 rounded-md" 
                                id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password">
                <button type="button" id="PasswordButton" class="p-2"><img id="eye" src="eye.svg" alt="olhinho"></button>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 w-4/6 flex flex-col">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
            
            <div class="flex items-center bg-white border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-lg border">
                <input class="w-full border-transparent focus:border-transparent focus:ring-0 rounded-md"
                id="password_confirmation"
                type="password"
                name="password_confirmation" required autocomplete="new-password">
                <button type="button" id="ConfirmPasswordButton" class="p-2"><img id="eyeConfirm" src="eye.svg" alt="olhinho"></button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <div class="flex items-center justify-end mt-4 w-4/6">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Está registrado?') }}
            </a>
        </div>
        <div class="flex items-center justify-center mt-4 w-4/6">

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
