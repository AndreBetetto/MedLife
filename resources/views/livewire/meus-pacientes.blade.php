<div>
    {{-- Parte da pesquisa --}}
    <input type="text" class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" placeholder="Pesquisar" wire:model="search">
    <label for="showOnlyNewUsers" style="color: #8a2be2; cursor: pointer;">
        <input type="checkbox" id="showOnlyNewUsers" wire:click="toggleShowOnlyNewUsers" class="mr-2" {{ $showOnlyNewUsers ? 'checked' : '' }}>
        {{ $showOnlyNewUsers ? 'Mostrar todos usuários' : 'Mostrar somente novos usuários' }}
    </label>
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
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 mt-9 ">
        @forelse ($pacientes as $index=>$paciente)
            @php
                
                foreach ($formsDiario as $formDiario) {
                    if ($formDiario->new == true) {
                        $new = true;
                        break;
                    } else {
                        $new = false;
                    }
                }                        
                $pacienteId = $arrayInfo[$index]->id;
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
                        {{ Str::title($arrayInfo[$index]->nome) }} 
                        {{ Str::title($arrayInfo[$index]->sobrenome) }} 
                        {{ $paciente->sobrenome }} 
                        
                        <br>
                        <a href="{{ route('areamedico.acessoProcessos', ['idPac' => $pacienteId]) }}" class="hover:font-semibold">Ver respostas</a>
                        <x:modals.medico.exam :user='$paciente->fone'/>
                        <form action="{{ route('areamedico.meusPacientescriarForm', ['id' => $pacienteId]) }}" method="GET">
                            @csrf
                            <button type="submit" class="font-bold">Criar formulário</button>
                        </form>
                        
                        @if(in_array($pacienteId, $arrayVerifica))
                            <p style="color: red">Novo!</p>
                        @endif
                        
                    </div>
                @endif
            </div>
        @empty
            <p>Sem pacientes adicionados</p>
        @endforelse
    </div>
</div>
