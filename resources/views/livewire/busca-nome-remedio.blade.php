<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div wire:ignore>
        <textarea wire:model='obsTextArea' name="observacoes" id="observacoes"></textarea>
    </div>
    <div>
        <div class="form-group dark:bg-slate-800 grid gap-4">
                <div class="grid gap-2">
                    <input type="hidden" name='paciente_id' value="{{ $row->id }}">
                    <input type="hidden" name="medico_id" value="{{$medico->id}}">
                </div>
                <h1 class="text-xl font-semibold mt-7">Medicamentos Selecionados</h1>
                <div class="rounded-md border border-slate-800 grid gap-4">
                    <div class=" bg-white rounded-md h-40   overflow-y-auto">
                        <div class="grid gap-2 p-3">
                            @if (empty($selectedMedicamentos))
                                <span class="font-semibold text-center mt-1">Nenhum medicamento selecionado</span>
                            @else
                                @php
                                    $count = 0;
                                @endphp
                                <div class="grid gap-2">
                                    @foreach ($selectedMedicamentos as $selected)
                                        @php
                                            $stringInput = $selected . ',' . $stringInput;
                                            //nome
                                            $name = $selectedMedicamentosName[$count];
                                            $count++;
                                        @endphp
                                        <p>
                                            <span class=" font-semibold"> {{ $name }} -</span>
                                            <button wire:click.prevent="removeMedicamento('{{ $selected }}')" class=" pb-1 pt-1 font-semibold flex-shrink-0 bg-red-400 text-slate-900 pl-2 pr-2 border-slate-700 text-sm border-2 px-1 rounded ml-auto ease-in-out"> Remover</button>
                                        </p>
                                        
                                    @endforeach
                                </div>
                                @php
                                // Remove the trailing comma
                                    $stringInput = rtrim($stringInput, ',');
                                    //echo $stringInput;
                                @endphp
                            @endif
                        </div>
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
                    @if (!isset($medicamentos['content']))
                        <span>Nenhum medicamento encontrado</span>
                    @elseif (isset($medicamentos['content']))
                        <div class="grid grid-cols-2 gap-4">
                        @foreach ($medicamentos['content'] as $med)
                            @php    
                                $numProcesso = $med['numProcesso'];
                                $nomeProduto = $med['nomeProduto'];
                            @endphp
                            <div class="grid">
                                <span>Nome: {{ Str::title($med['nomeProduto']) }} </span>
                                <span>Razão social: {{ Str::title($med['razaoSocial']) }} </span>
                                <button id="{{ $numProcesso }}"   
                                    wire:click.prevent="addMedicamento('{{$numProcesso}}', '{{$nomeProduto}}')"
                                    class="inline-block rounded bg-purple-300 my-3 px-3 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-400 hover:shadow-purple-400 focus:outline-none focus:ring-0"
                                    @if (in_array($numProcesso, $selectedMedicamentos))
                                        disabled
                                    @endif>
                                    @if (in_array($numProcesso, $selectedMedicamentos))
                                        Já adicionado
                                    @else
                                        Adicionar
                                    @endif
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
                        @php
                            $count = 0;
                        @endphp
                        <div class="grid gap-2">
                            @foreach ($selectedMedicamentos as $selected)
                                @php
                                    $stringInput = $selected . ',' . $stringInput;
                                    //nome
                                    $name = $selectedMedicamentosName[$count];
                                    $count++;
                                @endphp
                                <div>
                                    <span>{{ Str::title($name) }} -</span>
                                    <button wire:click.prevent="removeMedicamento('{{ $selected }}')" class="hover:font-bold">Remover</button>
                                </div>
                            @endforeach
                        </div>
                        @php
                        // Remove the trailing comma
                            $stringInput = rtrim($stringInput, ',');
                            //echo $stringInput;
                        @endphp
                    @endif
                </div>
                <input type="hidden" name="medicamentos" value="{{ $stringInput }}">
                <input type="submit" value="Enviar" name="enviar" class="font-bold text-gray-600 hover:text-gray-900 dark:hover:text-gray-400">
            </div>
        </div>
    </form>
</div>
