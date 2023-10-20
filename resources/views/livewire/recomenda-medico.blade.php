<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <br>
    <button class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue" wire:click.prevent="fetchAPIdata">
        Carregar lista de sintomas
    </button> <br>
    <div>   
        <form wire:submit.prevent="recomenda">
            @if ($dataFetched == true)
                <select id="symptomsSelected[]" wire:model="symptomsSelected" multiple >
                    @foreach ($symptoms as $symptom)
                        <option value={{ $symptom['ID'] }}> {{ __('translations.'.$symptom['Name']) }} </option>
                    @endforeach
                </select>
            @endif
            <br><br><br>
            <button  class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue" wire:click.prevent="getSpecialization" type="submit">Submit</button>
        </form> 
        <br>
        <label class="font-semibold">Resultado:</label>
        @forelse ($saida as $out)
            {{ $out['ID']}} - {{ __('translations.'.$out['Name']) }} - {{ $out['Accuracy']}}%
            <br>
        @empty
            Clínico geral
        @endforelse
        <br><br><br>
        <div class="flex flex-col gap-8">
            <input type="text" wire:model="searchMedic" placeholder="Pesquisar médico" class="rounded-md border-gray-300 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
            placeholder="Pesquise o nome do medico">
            <table class="">
                <p class="text-xl font-semibold leading-6 text-gray-800 ">Médicos cadastrados</p>
                
                
                @forelse ($medicos as $medico)
                    @php
                        $medicoId = $medico->id;
                        $isSelected = $jaSelecionados->contains('medico_id', $medicoId);
                        $imgIndex = $medicoId % $fileCount;
                        $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                        $imgPath = 'profilePics/'.$imgIndex.'.svg';
                    @endphp
                
                    <div class="w-full h-px bg-gray-300"></div>
                        <div class="flex justify-between items-center h-fit">
                            <img class="h-14 w-14 flex-none rounded-full bg-gray-50" src="{{ asset($imgPath) }}" alt="">
                            
                            <div class="min-w-0 flex-auto">
                                <p class="text-base font-semibold leading-6 px-5"> {{ $medico->nome }} </p>
                                <p class="mt-1 truncate text-sm leading-5 text-gray-500 px-5">  {{ $medico->especialidade }} </p>
                            </div>

                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900"> {{ $medico->crm }} </p>
                                

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
                                    Já selecionado
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
