<div>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-20 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8">
            <div class="flex justify-center items-center">
                <h2 class="text-xl font-bold leading-tight text-gray-800 mt-4 my-5 mb-8">Pacientes</h2>
            </div>

            {{-- Parte da pesquisa --}}
            <input type="text" class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" placeholder="Pesquisar" wire:model="search">
            <br><br><br><br>
            @php
                use Illuminate\Support\Facades\File;
                use Illuminate\Support\Facades\Storage;
                //$files = Storage::files('profile');
                $folderPath = public_path('profilePics');
                if (File::exists($folderPath) && File::isDirectory($folderPath)) {
                    $files = File::files($folderPath);
                    $fileCount = count($files);
    
                    //echo "Number of files in the folder: $fileCount";
                } else {
                    //echo "The specified folder does not exist or is not a directory.";
                    $fileCount = 1;
                }
            @endphp 
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @forelse ($pacientes as $paciente)
                    @php
                        //verify if new is true in formsDiario
                        

                        foreach ($formsDiario as $formDiario) {
                            if ($formDiario->new == true) {
                                $new = true;
                                break;
                            } else {
                                $new = false;
                            }
                        }                        
                        $pacienteId = $paciente->id;
                        //dd($paciente);
                        $isSelected = $pacMeds->contains('medico_id', $pacienteId);
                        $qntForms = $formsDiario->where('medico_id', $medico->id)
                                            ->where('paciente_id', $pacienteId)
                                            ->count();
                        $imgIndex = $pacienteId % $fileCount;
                        $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                        $imgPath = 'profilePics/'.$imgIndex.'.svg';
                    @endphp
                    <div>
                        @if (!$isSelected) 
                            <div>  
                                <img src="{{asset($imgPath)}}" alt="Paciente" class="h-full w-full object-cover object-center group-hover:opacity-75 rounded-full">
                            </div>
                            <div class="text-center text-lg">
                                {{ $paciente->nome }} 
                                {{ $paciente->sobrenome }} 
                                
                                <br>
                                <a href="{{ route('areamedico.acessoProcessos', ['idPac' => $paciente->id]) }}" class="hover:font-semibold">Ver respostas</a>
                                <form action="{{ route('areamedico.meusPacientescriarForm', ['id' => $paciente->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="font-bold">Criar formulario</button>
                                </form>
                                @if($new)
                                    <p style="color: red">NEW!</p>
                                @endif
                            </div>
                        @endif
                    </div>
                @empty
                    <p>Sem pacientes adicionados</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
