
<div>
    <div class="mx-auto max-w-2xl px-4 py-20 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8">
        <div class="flex justify-center items-center">
            <h2 class="text-xl font-bold leading-tight text-gray-800 dark:text-white mt-4 my-5 mb-8">Pacientes</h2>
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
        <div>
            @livewire('meus-pacientes', ['user' => $user, 
                                        'medico' => $medico, 
                                        'formsDiario' => $formsDiario,
                                        'pacMeds' => $pacMeds])
        </div>
    </div>
</div>
