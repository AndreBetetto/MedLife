<div>    
    Nome: {{$row->name}}
    <br>
    Tipo: {{$row->tipo}}
    <br>
    Email: {{$row->email}}
    <br>
    Criado em: {{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y')}}
    <br>
    Atualizado em: {{ Carbon\Carbon::parse($row->updated_at)->format('d/m/Y')}}
    <br>
    @if ($row->tipo == 'paciente')
        @include('livewire.paciente.registro.show')
    @endif
</div>
