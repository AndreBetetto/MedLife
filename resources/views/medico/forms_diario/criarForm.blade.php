<div>
    <br>

    Quais remedios o paceinte deve tomar?
    <form action="{{ route('areamedico.adicionarMedicamento')}} method="POST" enctype="multipart/form-data">
        @csrf
        Nome do medicamento:
        <input type='text' name='nome' placeholder='Nome do medicamento' required>
        <br>
        Laboratorio:
        <input type='text' name='razaoSocial' placeholder='Laboratorio' required>
        <br>
        Generico:
        <input type='radio' name='generico' value='true' required>Sim
        <input type='radio' name='generico' value='false' required>Nao

        <input type="submit" value="Adicionar">
        <br>
    </form>

    @livewire('busca-nome-remedio')
    
    <br>
</div>