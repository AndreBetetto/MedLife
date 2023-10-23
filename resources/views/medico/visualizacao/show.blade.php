<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="border-solid border-2 border-width: 2px;">
        <div class="mx-auto grid grid-cols-2 lg:flex-auto lg:py-20 lg:text-left">
            <img alt="equipe" class="w-full pl-28"  src="{{asset('imagemacharr.png')}}">
            <div class="flex flex-col justify-center pl-20">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Suas informações<br></h2>
                <span class="mt-3 text-lg leading-8 text-black-300">Médico: {{ Str::ucfirst($medico->nome) }}</span>
                <span class="mt-3 text-lg leading-8 text-black-300">CRM: {{ $medico->crm }}</span>
                <span class="mt-3 text-lg leading-8 text-black-300">Especialidade: {{ $medico->especialidade }}</span>
                <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                    {{--<a href="{{ route('areamedico.criarForms') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Ver formulário</a>--}}
                    <a href="{{ route('areamedico.meusPacientes') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Ver pacientes</a>
                    <!--  <a href="#" class="text-sm font-semibold leading-6 text-black">Learn more <span aria-hidden="true">→</span></a>-->
                </div>
            </div>
        </div>
    </div>
</div>