<div>
    {{-- The whole world belongs to you. --}}
    <div class="flex flex-col gap-8">
        <div>
            Nao sabe qual especialidade de médico escolher para sua consulta? <br>
            clique no botão abaixo, espere carregar a lista, e selecione os sintomas que voce está sentindo. <br>
            @livewire('recomenda-medico', ['paciente' => $paciente])
        </div>
        


        <table class="">
            <p class="text-xl font-semibold leading-6 text-gray-500 ">Medicos cadastrados:</p>
            
            
            @forelse ($medicos as $medico)
                @php
                    $medicoId = $medico->id;
                    $isSelected = $jaSelecionados->contains('medico_id', $medicoId);
                    //Randomizacao de imagens
                    $numAleatorio = rand(1, 28);
                    if($numAleatorio < 10)
                        $stringImg = 'p00'.$numAleatorio;
                    else
                        $stringImg = 'p0'.$numAleatorio;
                    //pega foto da pasta public
                    $caminhoImg = 'storage/profile/'.$stringImg.'.png';
                @endphp
               
                <div class="w-full h-px bg-gray-300"></div>
                    <div class="flex justify-between items-center h-fit">
                        <img class="h-14 w-14 flex-none rounded-full bg-gray-50" src="{{ asset($caminhoImg) }}" alt="">
                        
                        <div class="min-w-0 flex-auto">
                            <p class="text-base font-semibold leading-6 px-5"> {{ $medico->nome }} </p>
                            <p class="mt-1 truncate text-sm leading-5 text-gray-500 px-5">  {{ $medico->especialidade }} </p>
                        </div>

                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900"> {{ $medico->crm }} </p>
                            <p> {{ $medico->id }} </p>

                            @if (!$isSelected)
                                <p class="mt-1 text-xs leading-5 text-gray-500">
                                <form action="{{ route('areapaciente.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="medico_id" value="{{ $medicoId }}">
                                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                    <br>
                                    <button type="submit" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">
                                        Adicionar
                                    </button>
                                </form> 
                                </p>
                        </div>          
                            @elseif ($isSelected)
                                ja selecionado
                            @endif
                    </div>
                    </div>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No doctors available</td>
                </tr>
            @endforelse
        </table>   
    </div>
</div>
</div>