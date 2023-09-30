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
                        <span class="font-semibold">Número de dias</span>
                        <input type="number" name="numDias" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" value="7">
                        <x-input-error class="mt-2" :messages="$errors->get('numDias')" />
                    </div>
                    <div class="grid gap-1">
                        <span class="font-semibold">Observação</span>
                        <input type="text" name="observacao" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" value="Escreva">
                        <x-input-error class="mt-2" :messages="$errors->get('observacao')" />
                    </div>
                </div>
                <div class="grid gap-2">
                    <h1 class="pt-8 text-xl font-semibold">Adicionar medicamento</h1>
                    
                    <div class="grid grid-cols-1 gap-2">
                        <div class="grid gap-1">
                            <span class="font-semibold">Pesquisar</span>
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
                                    wire:click.prevent="addMedicamento('{{$numProcesso}}')"
                                    class="inline-block rounded bg-purple-300 my-3 px-3 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-400 hover:shadow-purple-400 focus:outline-none focus:ring-0">
                                    Adicionar
                                </button>
                            </div>
                        @endforeach
                        </div>
                    @endif
                    </div>
                </div>

                <div class="grid gap-2 pt-8">
                    <h1 class="text-xl font-semibold">Medicamentos Selecionados</h1>
                    
                    @if (empty($selectedMedicamentos))
                        <span>Nenhum medicamento selecionado</span>
                    @else
                        <div class="grid gap-2">
                            @foreach ($selectedMedicamentos as $selected)
                                <span>
                                    {{ $selected }}
                                    <button wire:click.prevent="removeMedicamento('{{ $selected }}')" class="hover:font-bold">- Remover</button>
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
                <input type="submit" value="Enviar" name="enviar" class="font-bold text-gray-600 hover:text-gray-900">
            </div>
        </div>
    </form>
</div>
