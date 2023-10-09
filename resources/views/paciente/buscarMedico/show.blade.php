<div>
    {{-- The whole world belongs to you. --}}
    <div class="flex flex-col gap-8">
        <div class="text-center font-semibold pt-5">
            Não sabe qual especialidade de médico escolher para sua consulta? <br>
            Clique no botão abaixo, espere carregar a lista, e selecione os sintomas que voce está sentindo. <br>
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

        @livewire('recomenda-medico', ['paciente' => $paciente, 'medicos' => $medicos, 'jaSelecionados' => $jaSelecionados, 'fileCount' => $fileCount, 'paciente' => $paciente])
        
    </div>
</div>
