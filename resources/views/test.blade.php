<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Teste
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-slate-800 shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    @php
                        $language = session('language', 'en');
                        app()->setLocale($language);
                    @endphp 
                    @livewire('chat-component')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>