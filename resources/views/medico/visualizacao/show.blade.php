<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="lm-3 ">
        <br>Suas informacoes:
        <br>------------------
        <br>Nome: {{ $medico->nome }}
        <br>CRM: {{ $medico->crm }}
        <br>Especialidade: {{ $medico->especialidade }}
        <br>
        <hr>
        Links:
        <a href=""></a>

        <hr>
        Parte de testes:
        Formulario <a href="{{ route('areamedico.criarForms') }}">Aqui</a><br>
        Meus pacientes: <a href="{{ route('areamedico.meusPacientes') }}">Aqui</a>
    </div>
</div>

