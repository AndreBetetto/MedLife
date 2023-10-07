@include('layouts.head')

<div>
    <div class="w-full py-8 text-center justify-center items-center">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Informações Pós-Operatório
        </h2>
        <div class="place-self-start">
            <p class="w-fit">Nome: </p>
            <p class="w-fit">Médico: </p>
        </div>
    </div>
    <div class="w-full h-px bg-black"></div>
    <form class="w-full" action="{{ route('areapaciente.medicoDetalhesFormsStore', ['id' =>$formsDiarios->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="paciente_id" id="paciente_id" value="{{$paciente->id}}">
        <input type="hidden" name="medico_id" id="medico_id" value="{{$medico->id}}">
        <input type="hidden" name="forms_id" id="forms_id" value="{{$formsDiarios->id}}">

        <div class="grid grid-cols-2 justify-items-center items-center py-5 w-full">
            <div class="w-3/5 h-full flex flex-col justify-evenly items-center">
                <div class="w-full flex justify-between items-center px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Médico
                    </label>
                    <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled type="text"
                    value="{{$medico->nome}}, {{$medico->sobrenome}}">
                </div>

                <div class="w-full flex justify-between items-center px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Paciente
                    </label>
                    <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled type="text"
                    value="{{$paciente->nome}}">
                </div>

                <div class="w-full flex justify-between items-center px-3 mb-6 md:mb-0">
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

                <div class="w-full flex justify-between items-center px-3 mb-6 md:mb-0">
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

                <div class="w-full flex justify-between items-center px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Profissão
                    </label>
                    <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled type="text"
                    value="{{$paciente->profissao}}">
                </div>
            </div>
            <div class="w-full flex gap-4 flex-col items-center">
                <div class="w-full md:w-max px-20 mb-6 md:mb-0 mr-auto">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
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
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" disabled type="text"
                    value="{{$numDia}}">
                    <input type="hidden" id="numDia" name="numDia" value="{{$numDia}}">
                </div>

                <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Grau de dor                    
                    </label>
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            {{-- paradinha --}}
                            <input type="hidden" name="nivelDor" id="nivelDor">

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-emerald-600 text-gray-900 bg-verde-1 border border-black rounded-l-lg focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-7000 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                1
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-emerald-500 text-gray-900 bg-verde-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                2
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-green-400 text-gray-900 bg-verde-3 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">                            3
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-lime-300 text-gray-900 bg-amarelo-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white backgrou">
                                4
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-yellow-300 text-gray-900 bg-amarelo-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                5
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-yellow-400 text-gray-900 bg-laranja-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                6
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-amber-500 text-gray-900 bg-laranja-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                7
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-orange-500 text-gray-900 bg-vermelho-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                8
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-red-500 text-gray-900 bg-vermelho-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                9
                            </button>

                            <button type="button" class="dor-btn px-3 py-1 text-sm font-medium bg-red-600 text-gray-900 bg-vermelho-3 border border-black rounded-r-md focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
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
                </div>

                {{-- Parte das observacoes --}}
                <textarea id="observacoesPaciente">{{$formsDiarios->observacoes}}</textarea>
                {{-- Parte das observacoes --}}
                
                <!-- <svg viewBox="0 0 36 36" fill="none" role="img" xmlns="http://www.w3.org/2000/svg" width="80" height="80"><mask id=":rdg:" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="#FFFFFF"></rect></mask><g mask="url(#:rdg:)"><rect width="36" height="36" fill="#e83535"></rect><rect x="0" y="0" width="36" height="36" transform="translate(7 1) rotate(133 18 18) scale(1.1)" fill="#e2d9c2" rx="6"></rect><g transform="translate(3.5 -4) rotate(-3 18 18)"><path d="M15 20c2 1 4 1 6 0" stroke="#000000" fill="none" stroke-linecap="round"></path><rect x="11" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect><rect x="23" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect></g></g></svg> -->
        
                <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Grau de Sangramento
                    </label>
                    
                    <label>
                        <input class="with-gap" name="sangramento" id="sangramento" type="radio" checked value="nenhum"/>
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

                <div class="mr-auto w-full md:w-max px-20 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-last-name">
                        Febre
                        <script>
                            // Ensure the DOM is ready
                            $(document).ready(function() {
                                // Get the range input element
                                var rangeInput = $('#nivelFebre');
                        
                                // Get the element where you want to display the selected value
                                var selectedValueElement = $('#selectedValue');
                        
                                // Update the displayed value when the range input value changes
                                rangeInput.on('input', function() {
                                    selectedValueElement.text('Selected Value: ' + rangeInput.val());
                                });
                            });
                        </script>
                        <div id="test-slider">
                            <input type="range" min="30" value="36.5" max="43" id="nivelFebre" step="0.1" name="nivelFebre" style="width: 200px"/>
                            <p id="selectedValue">Selected Value: 36.5</p>
                        </div>
                    </label><br>
                </div>

                <!-- <div class="frame">
                    <div id="febre" class="rslider"></div>
                    <div class="thermostat">
                        <div class="ring">
                            <div class="bottom_overlay"></div>
                        </div>
                        <div class="control">
                            <div class="temp_outside">23°</div>
                            <div class="temp_room"><span>°</span></div>
                            <div class="room">Sua temperatura</div>
                        </div>
                    </div>
                </div> -->

                @livewire('symptoms-form', ['paciente' => $paciente])
            
            
                {{-- 
                <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Outros sintomas
                    </label>
                    
                </div>--}}
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sintomas" name="sintomas" type="hidden" maxlength="100"
                    value="">
            </div>
            <div class="my-5 col-span-2 h-px w-full bg-black"></div>
            <div class="col-span-2 flex flex-wrap">
                <div class="w-full px-3 text-center justify-center items-center">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 items-center">
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
                <input type="hidden" name="alergias" id="alergias" value="AlergiasAAmendoim">
                <input type="hidden" name="diagnostico" id="diagnostico" value="not">
            </div>
            <div class="my-5 col-span-2 h-px w-full bg-black"></div> 
            <div class="col-span-2 flex flex-wrap items-center py-4">
                <div class="w-full px-3 text-center">
                    <h2 class="text-xl font-semibold leading-tight dark:text-white items-center">
                        Medicamentos
                        <input type="hidden" name="medicamentos" id="medicamentos" value="medicamentos">
                    </h2><br>
                </div>
                    @php
                        $medicamentos = $formsDiarios->medicamentos;
                        $ids = explode(',', str_replace(['[', ']'], '', $medicamentos));
                        //dd($ids);
                    @endphp
                    <div class="w-full text-center justify-center items-center">
                        <div class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-10" for="grid-last-name">
                            @livewire('apresenta-remedio', ['ids' => $ids])
                        </div>
                    </div> 
            </div> 
        </div>
        
    </form>
</div>
