<section>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <h2 class="col-span-2 text-xl text-center font-medium m-0 gap-0">Alterar senha</h2>

        <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
            <x-input-label for="current_password" :value="__('Senha atual')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
            <x-input-label for="password" :value="__('Nova senha')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="bg-purple-100 p-4 rounded-md dark:bg-purple-500">
            <x-input-label for="password_confirmation" :value="__('Confirmar nova senha')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="w-full justify-center flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Atualizado.') }}</p>
            @endif
        </div>
    </form>
</section>