<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <main class="pt-24 pb-12 mx-20 grid grid-cols-1">
        <div class="">
            <div class="">
                <h2>Detalhes da conta</h2>
                <div class="">
                    <img src="" alt="">
                </div>
            </div>
        </div>
        <div class="grid-cols-2">
            <div class="hidden md:flex md:items-center md:ml-6 ">
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
    </main>
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('paciente.profile.form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>