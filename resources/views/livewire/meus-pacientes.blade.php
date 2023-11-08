<div class="grid gap-7">
    {{-- Parte da pesquisa --}}
    <div class="grid gap-2">
        <input type="text" class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline dark:bg-slate-800" placeholder="Pesquisar" wire:model="search">
        <label for="showOnlyNewUsers" style="color: #8a2be2; cursor: pointer;">
            <input type="checkbox" id="showOnlyNewUsers" wire:click="toggleShowOnlyNewUsers" class="mr-2" {{ $showOnlyNewUsers ? 'checked' : '' }}>
            {{ $showOnlyNewUsers ? 'Mostrar todos usuários' : 'Mostrar somente novos usuários' }}
        </label>
    </div>
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
            <div class="shadow-2xl p-4 grid gap-2 bg-zinc-50 dark:bg-slate-900">
                @if (!$isSelected) 
                    <div class="grid grid-cols-2 items-center gap-4 mb-4">  
                        <img src="{{asset($imgPath)}}" alt="Paciente" class="h-[100px] w-[100px] object-cover object-center group-hover:opacity-75 rounded-full">
                        {{ $paciente->nome }}
                        <span>{{ Str::title($arrayInfo[$index]->nome) }} {{ Str::title($arrayInfo[$index]->sobrenome) }}</span>
                        {{ $paciente->sobrenome }} 
                    </div>
                    <div class="text-center text-sm grid gap-2">
                        <div class="grid grid-cols-2 w-full gap-2">
                            <x:modals.medico.exam/>
                            <form action="{{ route('areamedico.meusPacientescriarForm', ['id' => $pacienteId]) }}" class="w-full method="GET">
                                @csrf
                                <button type="submit" class="rounded-xl px-4 py-2 w-full bg-transparent content-center border-4 gap-2 hover:bg-gray-300/25 duration-200">Criar formulário</button>
                            </form>
                        </div>
                        <a href="{{ route('areamedico.acessoProcessos', ['idPac' => $pacienteId]) }}" class="w-full text-xl text-neutral-50 rounded-2xl px-8 py-2 bg-violet-500 content-center gap-2 hover:bg-violet-600 duration-200">Ver respostas</a>
                        @if(in_array($pacienteId, $arrayVerifica))
                            <p style="color: red">Nova resposta!</p>
                        @endif
                        
                    </div>
                @endif
            </div>
        @empty
            <p class="w-full">Sem pacientes adicionados recentemente</p>
        @endforelse
    </div>
</div>
