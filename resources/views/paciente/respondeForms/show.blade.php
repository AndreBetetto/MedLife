@include('layouts.head')

<div>
    <div class="w-full text-center justify-center items-center">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Informações Pós-Operatório
        </h2><br>
    </div>

    <form class="w-full">
        <div class="grid grid-cols-2 items-center  w-full -mx-3 mb-6">
        <div class="w-full flex flex-col items-center">
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
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled id="grid-first-name" type="text"
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
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled id="grid-first-name" type="text"
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
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled id="grid-first-name" type="text"
                value="{{$sexo}}">
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Profissão
                </label>
                <input class="appearance-none block w-max bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled id="grid-first-name" type="text"
                value="{{$paciente->profissao}}">
            </div>
        </div>
        
        <div class="w-full flex flex-col items-center">
            <div class="w-full md:w-max px-20 mb-6 md:mb-0 mr-auto">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Dia
                </label>
                @php
                    if($checklist->count() == 0)
                    {
                        $numDia = 1;
                    } else {
                        $numDia = $checklist->numDia+1;
                    }
                    echo $numDia;
                @endphp
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" disabled id="grid-last-name" type="text"
                value="{{$numDia}}">
            </div>

            <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Grau de dor                    
                </label>
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button type="button" title="aaa" class="px-3 py-1 text-sm font-medium text-gray-900 bg-verde-1 border border-black rounded-l-lg focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-7000 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            1
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-verde-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            2
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-verde-3 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            3
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-amarelo-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            4
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-amarelo-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            5
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-laranja-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            6
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-laranja-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            7
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-vermelho-1 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            8
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-vermelho-2 border border-black focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            9
                        </button>

                        <button type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-vermelho-3 border border-black rounded-r-md focus:z-10 focus:ring-2 focus:ring-black focus:text-grey-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            10
                        </button>
                    </div>
            </div><br>
    
            <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Grau de Sangramento
                </label>
                
                <label>
                    <input class="with-gap" name="group1" type="radio" />
                    <span>Nenhum</span>
                </label><br>

                <label>
                    <input class="with-gap" name="group1" type="radio"  />
                    <span>Pouco</span>
                </label><br>

                <label>
                    <input class="with-gap" name="group1" type="radio"  />
                    <span>Médio</span>
                </label><br>

                <label>
                    <input class="with-gap" name="group1" type="radio"  />
                    <span>Intenso</span>
                </label><br>
            </div>

            <div class="mr-auto w-full md:w-max px-20 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    <br><br>Febre
                    <div id="test-slider">
                        <input type="range" min="0" max="100" />
                    </div>
                </label><br>
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
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" maxlength="100">
            </div>
        </div> 

        <hr class="mx-4 border-gray-300">
        <hr class="border-gray-300">

        <div class="flex flex-wrap -mx-3 mb-6 items-center">
            <div class="w-full px-3 text-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 items-center -mt-12">
                    <br>Medicamentos
                </h2><br>
            </div>
            
            <div class="w-full text-center justify-center items-center">
                <div class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-10" for="grid-last-name">
                    Dipirona&nbsp; &nbsp;
                    <label>
                        <input type="checkbox" class=""/>
                        <span>08h</span> &nbsp; &nbsp;
                    </label>

                    <label>
                        <input type="checkbox" class=""/>
                        <span>10h</span>&nbsp; &nbsp;
                    </label>

                    <label>
                        <input type="checkbox" class=""/>
                        <span>12h</span>&nbsp; &nbsp;
                    </label>
                </div>
            </div>  
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
            
            <button class="mt-12 flex-shrink-0 bg-purple-300 border-purple-300 text-sm border-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 py-1 px-2 rounded ml-auto" type="button">
                Enviar Dados
            </button>
        </div>
    </div>
    </form>
</div>

