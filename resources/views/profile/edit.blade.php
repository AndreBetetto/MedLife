<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-col gap-6 w-full">
                    @include('paciente.registro.form')
                    <div class="mt-4 bg-purple-100 p-4 rounded-md dark:bg-purple-950">
                        <div class="grid grid-cols-1 place-items-center gap-2">
                            <h1 class="text-lg font-medium">Linguagem API</h1>
                            <form action="{{ route('language') }}" method="POST">
                                @csrf
                                <select name="language" onchange="this.form.submit()" class="border rounded border-gray-400 dark:bg-slate-800">
                                    <option value="en" {{ session('language') == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="pt-br" {{ session('language') == 'pt-br' ? 'selected' : '' }}>Português</option>
                                    <option value="es" {{ session('language') == 'es' ? 'selected' : '' }}>Español</option>
                                    <option value="de" {{ session('language') == 'de' ? 'selected' : '' }}>Germany</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    @include('profile.partials.update-password-form')
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>