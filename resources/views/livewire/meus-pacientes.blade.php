<div>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-20 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8">
            <div class="flex justify-center items-center">
                <h2 class="text-xl font-bold leading-tight text-gray-800 mt-4 my-5 mb-8">Pacientes</h2>
            </div>

            //echo "Number of files in the folder: $fileCount";
        } else {
            //echo "The specified folder does not exist or is not a directory.";
            $fileCount = 1;
        }
        
    @endphp 
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 mt-9 ">
        @forelse ($pacientes as $index=>$paciente)
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
                @empty
                    <p>Sem pacientes adicionados</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
