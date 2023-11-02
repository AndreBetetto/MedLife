<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="border-solid border-2 px-32 py-16">
        <div class="grid grid-cols-2 gap-8 py-36">
            <img alt="equipe" class="w-full"  src="{{asset('imagemacharr.png')}}">
            <div class="flex flex-col justify-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Suas informações<br></h2>
<<<<<<< HEAD
                <div class="ml-4 mt-2 flex flex-col">
                    <span class="text-lg text-black-300">Médico: {{ Str::ucfirst($medico->nome) }}</span>
                    <span class="text-lg text-black-300">CRM: {{ $medico->crm }}</span>
                    @php
                        $item = str_replace('_', ' ', $medico->especialidade);
                        $item = __('translations.'.$medico->especialidade);
                    @endphp
                    <span class="text-lg text-black-300">Especialidade: {{ $item }}</span>
                </div>
=======
                <span class="mt-3 text-lg leading-8 text-black-300">Médico: {{ Str::ucfirst($medico->nome) }}</span>
                <span class="mt-3 text-lg leading-8 text-black-300">CRM: {{ $medico->crm }}</span>
                <span class="mt-3 text-lg leading-8 text-black-300">Especialidade: {{ __('translations.'.$medico->especialidade) }}</span>
>>>>>>> a970346483d4bc89d3e2f4e562053896ef757948
                <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                    {{--<a href="{{ route('areamedico.criarForms') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Ver formulário</a>--}}
                    <a href="{{ route('areamedico.meusPacientes') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Ver pacientes</a>
                    <!--  <a href="#" class="text-sm font-semibold leading-6 text-black">Learn more <span aria-hidden="true">→</span></a>-->
                </div>
            </div>
        </div>
    </div>
</div>