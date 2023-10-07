<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="lm-3">
        <div class="grid grid-cols-1 gap-4 justify-center items-center ">
            <h3 class="text-lg font-bold leading-7 text-center dark:text-white">Suas informações</h3>
        </div><br><hr>
    
      
        <br>
        <label class="font-semibold dark:text-white">Médico:</label> {{ Str::ucfirst($medico->nome) }}
        <br>
        <label class="font-semibold dark:text-white">CRM:</label> {{ $medico->crm }}
        <br>
        <label class="font-semibold dark:text-white">Especialidade:</label> {{ $medico->especialidade }}
        <br><br>
        
        <hr>
        <div class="px-4 sm:px-0">
            <br><h3 class="text-lg font-bold leading-7 dark:text-white">Seção do Paciente</h3><br>
        </div>

        <div class="pb-2">
            <label class="font-semibold dark:text-white">Formulário </label> <a href="{{ route('areamedico.criarForms') }}" class="px-11 hover:font-bold hover:text-gray-700">Ver formulário</a><br>
        </div>

        <label class="font-semibold dark:text-white">Meus pacientes</label> <a href="{{ route('areamedico.meusPacientes') }}" class="px-3 hover:font-bold hover:text-gray-700">Ver pacientes</a>
    </div>
</div>

   </div>
