<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        <form action="{{ route('areamedico.passarParaPaciente')}}" method='POST' enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="exampleFormControlSelect1">Selecione o paciente</label>
                
                ID paciente:
                <input type="text" name='paciente_id' value="{{ $row->id }}">
                <br>
                ID medico
                <input type="text" name="medico_id" value="{{$medico->id}}">
                <br>
                num dias
                <input type="text" name="numDias" value="7">
                <br>
                Observação
                <input type="text" name="observacoes" value="teste">
                <br>
                Medicamentos:
                <input type="text" name="medicamentos" value="med1, med2, med3">
                <br>
                Diagnostico
                <input type="text" name="diagnostico" value="teste">
                <br>
                Status:
                <input type="text" name="status" value="Aguardando">
                <input type="submit" value="Adicionar" name="Adicionar">
                <br>
            </div>
        </form>
    </div>
    
    <div>
        Adicionar medicamento
        
        Pesquisar: <input type="text" wire:model="search"><br>  
        @if ($medicamentos['content'] == null)
            Nenhum medicamento encontrado
            
        @endif
        @foreach ($medicamentos['content'] as $med)
            Nome: {{ $med['nomeProduto'] }} <br>
            Razao social: {{ $med['razaoSocial'] }} <br>
            id: {{ $med['idProduto'] }} - 
            <button
                wire:click="addMedicamento({{ $med['idProduto'] }})"
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
        <h2>Medicamentos Selecionados:</h2>
        
        @if (empty($selectedMedicamentos))
            Nenhum medicamento selecionado
        @else
            <ul>
                @foreach ($selectedMedicamentos as $selected)
                    <li>
                        {{ $selected }}
                        <button wire:click="removeMedicamento('{{ $selected }}')">Remover</button>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
