
<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-20 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8 dark:bg-slate-800">
        <h2 class="flex items-center text-xl font-bold leading-tight text-gray-800 mt-4 my-5">Pacientes</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @forelse ($pacientes as $paciente)
                @php
                    $pacienteId = $paciente->id;
                    $isSelected = $pacMeds->contains('medico_id', $pacienteId);
                    $qntForms = $formsDiario->where('medico_id', $medico->id)
                                        ->where('paciente_id', $pacienteId)
                                        ->count();
                @endphp
                       
                    <div>
                        @if (!$isSelected) 
                            <div>  
                                <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Paciente" class="h-full w-full object-cover object-center group-hover:opacity-75 rounded-full">
                            </div>
                            
                            <div class="text-center text-lg">
                                {{ $paciente->nome }} 
                                {{ $paciente->sobrenome }} 
                                <p>{{ $qntForms }} processos</p>
                                Respostas <a href="{{ route('areamedico.acessoProcessos', ['idPac' => $paciente->id]) }}">Clique aqui!</a>
                                <form action="{{ route('areamedico.meusPacientescriarForm', ['id' => $paciente->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="font-bold">Criar formulario</button>
                                </form>
                            </div>
                        @endif
                    </div>

                    @empty
                        <p>Sem pacientes adicionados</p>
            @endforelse
        </div>
    </div>
</div>