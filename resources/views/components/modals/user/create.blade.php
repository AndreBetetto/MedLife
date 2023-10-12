<x-form-modal>
    <form action="{{ route('crudUser.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-8">
        @csrf

        <div class="gap-8">
            <div class="">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <div class="">
                <label for="email">Email</label>
                <input id="email" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" type="email" name="email" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="">
                <label for="password" :value="__('Senha')">Senha</label>
                <input id="password" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="">
                <label for="password_confirmation" :value="__('Confirmar Senha')">Confirmar </label>

                <input id="password_confirmation" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="gap-8">
            <!-- Other user registration fields go here if needed -->

            <div>
                <x-primary-button type="submit">{{ __('Register') }}</x-primary-button>
                <x-primary-button type="reset">{{ __('Clear') }}</x-primary-button>
            </div>
        </div>
    </form>
</x-form-modal>