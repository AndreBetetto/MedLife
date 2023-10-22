<x-form-modal>
    <form action="{{ route('crudUser.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-8">
        @csrf

        <div class="gap-8">
            <div class="">
                <label for="name">Nome</label>
                <x-text-input id="name" class="block mt-1 w-full" name="name" type="text" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <div class="">
                <label for="email">Email</label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="">
                <label for="password" :value="__('Senha')">Senha</label>
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="">
                <label for="password_confirmation" :value="__('Confirmar Senha')">Confirmar </label>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="gap-8 mt-5">
            <!-- Other user registration fields go here if needed -->

                <div>
                    <x-primary-button type="submit">{{ __('Enviar') }}</x-primary-button>
                    <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
                </div>
            </div>
        </div>
    </form>
</x-form-modal>