<x:modals.edit>
    <form action="{{ route('crudUser.update') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-8">
        @csrf
        @method('PUT')
        <div class="gap-8">
            <div class="">
                <label for="name">Nome</label>
                <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" required autofocus 
                value="{{ $users->name }}"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>
            @php
                echo $users->email;
            @endphp
            <div class="">
                <label for="email">Email</label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" 
                value="{{ $users->email }}"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            <x-text-input type="hidden" id="id" name="id" value="{{ $users->id }}">
        </div>

        <div class="gap-8">
            <!-- Other user registration fields go here if needed -->

            <div>
                <x-primary-button type="submit">{{ __('Atualizar') }}</x-primary-button>
                <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
            </div>
        </div>
    </form>
</x:modals.edit>