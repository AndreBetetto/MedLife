<section  class="space-y-6 flex justify-center">
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'create-new-user')"
        class="rounded bg-purple-500 flex items-center align-middle gap-3 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-purple-300 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
    >
        <i class="large material-icons">person_add</i>
        <span>Adicionar Usuário</span>
    </button>

    <x-modal name="create-new-user" focusable>
        <form action="{{ route('crudUser.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-center gap-8 p-2">
            @csrf

            <div class="grid gap-1 w-5/6">
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
    </x-modal>
</section>