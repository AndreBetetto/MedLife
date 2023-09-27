<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        <form action="{{ route('areamedico.passarParaPaciente')}}" method='POST' enctype="multipart/form-data">
            @csrf

            <div class="form-group dark:bg-slate-800 grid gap-4">
                <div class="grid gap-2">
                    <input type="hidden" name='paciente_id' value="{{ $row->id }}">
                    <input type="hidden" name="medico_id" value="{{$medico->id}}">
                    <div class="grid gap-1">
                        <span>Número de dias:</span>
                        <input type="number" name="numDias" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" value="7">
                        <x-input-error class="mt-2" :messages="$errors->get('numDias')" />
                    </div>
                    <div class="grid gap-1">
                        <span>Observação:</span>
                        <input type="text" name="observacao" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" value="Escreva">
                        <x-input-error class="mt-2" :messages="$errors->get('observacao')" />
                    </div>
                </div>
                <div class="grid gap-2">
                    <h1 class="text-xl">Adicionar medicamento</h1>
                    
                    <div class="grid grid-cols-1 gap-2">
                        <div class="grid gap-1">
                            <span>Pesquisar:</span>
                            <input type="text" name="search" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" wire:model.prevent="search">
                            <x-input-error class="mt-2" :messages="$errors->get('search')" />
                        </div>
                    @if ($medicamentos['content'] == null)
                        <span>Nenhum medicamento encontrado</span>
                    @elseif ($medicamentos['content'] != null)
                        <div class="grid grid-cols-2 gap-4">
                        @foreach ($medicamentos['content'] as $med)
                            @php    
                                $numProcesso = $med['numProcesso'];
                            @endphp
                            <div class="grid">
                                <span> Nome: {{ $med['nomeProduto'] }} </span>
                                <span> Razao social: {{ $med['razaoSocial'] }} </span>
                                <button id="{{ $numProcesso }}"   
                                    wire:click.prevent="addMedicamento('{{$numProcesso}}')">
                                Adicionar
                                </button> </span>
                            </div>
                        @endforeach
                        </div>
                    @endif
                    </div>
                </div>
                <div class="grid gap-4">
                    <h1 class="text-xl">Medicamentos Selecionados:</h1>
                    
                    @if (empty($selectedMedicamentos))
                        <span>Nenhum medicamento selecionado</span>
                    @else
                        <div class="grid gap-2">
                            @foreach ($selectedMedicamentos as $selected)
                                <span>
                                    {{ $selected }}
                                    <button wire:click.prevent="removeMedicamento('{{ $selected }}')">- Remover</button>
                                </span>
                                @php
                                    $stringInput = $selected . ',' . $stringInput;
                                @endphp
                            @endforeach
                        </div>
                        @php
                        // Remove the trailing comma
                            $stringInput = rtrim($stringInput, ',');
                        @endphp
                    @endif
                </div>
                <input type="hidden" name="medicamentos" value="{{ $stringInput }}">
                <input type="submit" value="Atualizar" name="atualizar">
            </div>
        </div>
    </form>
</div>
