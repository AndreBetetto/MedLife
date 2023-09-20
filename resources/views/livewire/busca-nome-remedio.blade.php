<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        <form action="{{ route('areamedico.passarParaPaciente')}}" method='POST' enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <input type="hidden" name='paciente_id' value="{{ $row->id }}">
                <br>
                <input type="hidden" name="medico_id" value="{{$medico->id}}">
                <br>
                Numero de dias
                <input type="number"  name="numDias" value="7">
                <br>
                Observação
                <input type="text" name="observacoes" value="teste">
                <br> 
                <div>
                    Adicionar medicamento
                    
                    Pesquisar: <input type="text" wire:model.prevent="search"><br>  
                    @if ($medicamentos['content'] == null)
                        Nenhum medicamento encontrado
                        
                    @endif
                    @foreach ($medicamentos['content'] as $med)
                        Nome: {{ $med['nomeProduto'] }} <br>
                        Razao social: {{ $med['razaoSocial'] }} <br>
                        id: {{ $med['idProduto'] }} - 
                        <button
                            wire:click.prevent="addMedicamento({{ $med['idProduto'] }})"
                            wire:loading.attr="disabled"
                            wire:target="addMedicamento({{ $med['idProduto'] }})"
                            @if (in_array($med['idProduto'], $selectedMedicamentos))
                                disabled
                            @endif
                        >
                        Adicionar
                    </button>

                        <br>
                    @endforeach
                </div>
                <div>
                    <h2>Medicamentos Selecionados:</h2><br>
                    
                    @if (empty($selectedMedicamentos))
                        Nenhum medicamento selecionado
                    @else
                        <ul>
                            @foreach ($selectedMedicamentos as $selected)
                                <li>
                                    {{ $selected }}
                                    <button wire:click="removeMedicamento('{{ $selected }}')">Remover</button>
                                </li>
                                @php
                                    $stringInput = $selected . ',' . $stringInput;
                                @endphp
                            @endforeach
                        </ul>
                        @php
                        // Remove the trailing comma
                            $stringInput = rtrim($stringInput, ',');
                        @endphp
                    @endif
                </div>
                <input type="hidden" name="medicamentos" value="{{ $stringInput }}">
                <input type="submit" value="Adicionar" name="Adicionar">
                <br>
            </div>
        </div>
    </form>
</div>
