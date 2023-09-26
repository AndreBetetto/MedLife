@include('layouts.head')

<div>
    <div class="w-full text-center justify-center items-center">
        <h2 class="text-xl font-bold leading-tight text-gray-800 py-8">
            Informações Pós-Operatório
        </h2><br>
    </div>

    <form class="w-full" action="{{ route('areapaciente.medicoDetalhesFormsStore', ['id' =>$formsDiarios->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="paciente_id" id="paciente_id" value="{{$paciente->id}}">
        <input type="hidden" name="medico_id" id="medico_id" value="{{$medico->id}}">
        <input type="hidden" name="forms_id" id="forms_id" value="{{$formsDiarios->id}}">

        
        <div class="grid grid-cols-2 items-center  w-full -mx-3 mb-6">
        <div class="w-full flex flex-col items-center">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Dia
                </label>
                @php
                    if($checklist->count() == 0)
                    {
                        $numDia = 1;
                    } else {
                        $checklist = $checklist->last();
                        $numDia = $checklist->numDia+1;
                    }
                @endphp
                <input class="appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" disabled name="numDia" id="numDia" type="text"
                value="{{$numDia}}">
                <input type="hidden" id="numDia" name="numDia" value="{{$numDia}}">
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Médico
                </label>
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled id="grid-first-name" type="text"
                value="{{$medico->nome}}, {{$medico->sobrenome}}">
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Nome do Paciente
                </label>
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled type="text"
                value="{{$paciente->nome}}">
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Idade
                </label>
                @php
                    use Carbon\Carbon;
                    $dataNascimento = $paciente->dataNasc;
                    $idade = Carbon::parse($dataNascimento)->age;
                @endphp
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled type="text"
                value="{{$idade}}">
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Sexo
                </label>
                @php
                    $sexo = $paciente->sexo;
                    if ($sexo == 'Masc') {
                        $sexo = 'Masculino';
                    } else {
                        $sexo = 'Feminino';
                    }
                @endphp
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled type="text"
                value="{{$sexo}}">
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Profissão
                </label>
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled type="text"
                value="{{$paciente->profissao}}">
            </div>
        </div>
        
        <div class="w-full flex flex-col items-center">
            <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Grau de dor                    
                </label>
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        {{-- paradinha --}}
                        <input type="hidden" name="nivelDor" id="nivelDor">

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-verde-1 border border-black rounded-l-lg focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-7000 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            1
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-verde-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            2
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-verde-3 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">                            3
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-amarelo-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white backgrou">
                            4
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-amarelo-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            5
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-laranja-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            6
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-laranja-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            7
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-vermelho-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            8
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-vermelho-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            9
                        </button>

                        <button type="button" class="dor-btn px-3 py-1 text-sm font-medium text-gray-900 bg-vermelho-3 border border-black rounded-r-md focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            10
                        </button>
                    </div>
                    <script>
                        const selectionButtons = document.querySelectorAll('.dor-btn');
                        const nivelDorInput = document.getElementById('nivelDor');
                    
                        selectionButtons.forEach((button, index) => {
                            button.addEventListener('click', () => {
                                // Update the value of the nivelDor input
                                nivelDorInput.value = index + 1;
                    
                                // Reset the styling for all selection buttons
                                selectionButtons.forEach(btn => {
                                    btn.classList.remove('selected');
                                });
                    
                                // Add selected class to the clicked button
                                button.classList.add('selected');
                            });
                        });
                    </script>
            </div><br>
            
            <svg viewBox="0 0 36 36" fill="none" role="img" xmlns="http://www.w3.org/2000/svg" width="80" height="80"><mask id=":rdg:" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#FFFFFF"></rect></mask><g mask="url(#:rdg:)"><rect width="36" height="36" fill="#e83535"></rect><rect x="0" y="0" width="36" height="36" transform="translate(7 1) rotate(133 18 18) scale(1.1)" fill="#e2d9c2" rx="6"></rect><g transform="translate(3.5 -4) rotate(-3 18 18)"><path d="M15 20c2 1 4 1 6 0" stroke="#000000" fill="none" stroke-linecap="round"></path><rect x="11" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect><rect x="23" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect></g></g></svg>
    
            <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Grau de Sangramento
                </label>
                
                <label>
                    <input class="with-gap" name="sangramento" id="sangramento" type="radio" checked value="nenhum" required/>
                    <span>Nenhum</span>
                </label><br>

                <label>
                    <input class="with-gap" name="sangramento" id="sangramento" type="radio" value="pouco" />
                    <span>Pouco</span>
                </label><br>

                <label>
                    <input class="with-gap" name="sangramento" id="sangramento" type="radio" value="medio" />
                    <span>Médio</span>
                </label><br>

                <label>
                    <input class="with-gap" name="sangramento" id="sangramento" type="radio" value="muito" />
                    <span>Intenso</span>
                </label><br>
            </div>

            <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    <br><br>Febre

                    <div id="test-slider">
                        <input type="range" min="0" max="100" id="nivelFebre" name="nivelFebre"/>
                    </div>
                </label><br>
            </div>

            <div class="frame">
                <div id="febre" class="rslider"></div>
                <div class="thermostat">
                    <div class="ring">
                        <div class="bottom_overlay"></div>
                    </div>
                    <div class="control">
                        <div class="temp_room"><span>°</span></div>
                        <div class="room">Sua temperatura</div>
                    </div>
                </div>
            </div>

        
            {{-- Sintomas --}}
            <div>
               @livewire('symptoms-form', ['paciente' => $paciente])
            </div>
            {{-- FimSintomas --}}

            <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Outros sintomas
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sintomas" name="sintomas" type="text" maxlength="100"
                value="273,75">
            </div>
        </div> 

        <hr class="mx-4 border-gray-300">
        <hr class="border-gray-300">

        <div class="flex flex-wrap -mx-3 mb-6 items-center">
            <div class="w-full px-3 text-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 items-center -mt-12">
                    
                    <br>Medicamentos
                    <input type="hidden" name="medicamentos" id="medicamentos" value="medicamentos">
                </h2><br>
            </div>
            @php
                $medicamentos = $formsDiarios->medicamentos;
                $ids = explode(',', str_replace(['[', ']'], '', $medicamentos));
                //dd($ids);
            @endphp
            <script>
                // JavaScript function to load medication data asynchronously
                function loadMedicationData(medicationId) {
                    if (medicationId !== '') {
                        fetch("https://bula.vercel.app/medicamento/" + medicationId)
                            .then(response => response.json())
                            .then(data => {
                                // Update the DOM with the fetched data
                                const medicationNameElement = document.querySelector(`.medicamento-name-${medicationId}`);
                                if (medicationNameElement) {
                                    medicationNameElement.textContent = data.nomeComercial;
                                }
                            })
                            .catch(error => {
                                console.error("Error fetching medication data:", error);
                            });
                    }
                }
            
                // Trigger the API calls for each medication ID
                const medicationIds = {!! json_encode($ids) !!};
                medicationIds.forEach(medicationId => {
                    loadMedicationData(medicationId);
                });
            </script>
             
        </div>

        <div class="flex flex-wrap -mx-3 mb-6 ">
            <div class="w-full px-3 text-center justify-center items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 items-center mt-4">
                    <br>Curativos
                </h2><br>
            </div>

            <div class="w-full text-center justify-center items-center">
                <div class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-10 justify-center items-center" for="grid-last-name">
                    Higienizar&nbsp; &nbsp;
                    <label>
                        <input type="checkbox" class=""/>
                        <span>08h</span> &nbsp; &nbsp;
                    </label>

                    <label>
                        <input type="checkbox" class=""/>
                        <span>16h</span>&nbsp; &nbsp;
                    </label>

                    <label>
                        <input type="checkbox" class=""/>
                        <span>22h</span>&nbsp; &nbsp;
                    </label>
                </div>
            </div>
            <input type="hidden" name="observacoes" id="observacoes" value="obs">
            <input type="hidden" name="status" id="status" value="em andamento">
            <input type="hidden" name="prioridadeMedico" id="prioridadeMedico" value="true">
            <input type="hidden" name="grupo" id="grupo" value="grupo">
            <input type="hidden" name="tipo" id="tipo" value="tipo">
            <input type="hidden" name="alergias" id="alergias" value="AlewrgiasAAmendoim">
            <input type="hidden" name="diagnostico" id="diagnostico" value="not">

            
            <button class="mt-12 flex-shrink-0 bg-purple-300 border-purple-300 text-sm border-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 py-1 px-2 rounded ml-auto" type="button">
                <input wire:submit.prevent="submitForm" type="submit" name="ENVIAR">
            </button>
        </div>
    </div>
    </form>
</div>
