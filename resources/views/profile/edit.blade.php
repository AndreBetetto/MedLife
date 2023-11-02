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
                    @if (Auth::user()->role == 'user')
                        @include('paciente.registro.form', ['user' => $user] )
                    @elseif (Auth::user()->role == 'paciente')
                        @include('paciente.registro.updateForm', ['user' => $user, 'paciente' => $paciente])
                    @elseif (Auth::user()->role == 'medico')
                        @include('medico.registro.updateForm', ['user' => $user, 'medico' => $medico])
                    @elseif (Auth::user()->role == 'admin')
                        <span>Conta do admin</span>
                    @endif
                    <div class="mt-4 bg-purple-100 p-4 rounded-md dark:bg-purple-500">
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
                    <div class="mt-4 bg-purple-100 p-4 rounded-md dark:bg-purple-500">
                        <div class="grid grid-cols-1 place-items-center gap-2">
                            <h1 class="text-lg font-medium">Excluir USUÁRIO</h1>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>