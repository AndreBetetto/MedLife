<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="lm-3">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-bold leading-7 text-gray-800">Suas informações</h3>
        </div><br><hr>
      
        <br>
        <label class="font-semibold text-gray-900">Médico:</label> {{ $medico->nome }}
        <br>
        <label class="font-semibold text-gray-900">CRM:</label> {{ $medico->crm }}
        <br>
        <label class="font-semibold text-gray-900">Especialidade:</label> {{ $medico->especialidade }}
        <br><br>
        <hr><br>
        Links: 
        <a href=""></a>
        
        <hr>
        <div class="px-4 sm:px-0">
            <br><h3 class="text-lg font-bold leading-7 text-gray-800">Parte de testes</h3><br>
        </div>
        <label class="font-semibold text-gray-900">Formulário </label> <a href="{{ route('areamedico.criarForms') }}" class="px-11 hover:font-bold hover:text-purple-800">Ver formulário</a><br>
        <label class="font-semibold text-gray-900">Meus pacientes</label> <a href="{{ route('areamedico.meusPacientes') }}" class="px-3 hover:font-bold hover:text-purple-800">Ver pacientes</a>
    </div>
</div>

