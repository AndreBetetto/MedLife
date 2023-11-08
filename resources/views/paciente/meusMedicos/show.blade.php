<div>
    {{-- The whole world belongs to you. --}}
    <div>
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

        <div class="flex flex-col gap-8 mt-2 w-full">
            <table class="">
                <p class="text-xl font-semibold leading-6 text-gray-800 ">Meus médicos</p>

            @forelse ($medicos as $medico)
            @php
                $medicoId = $medico->id;
                $isSelected = $pacMeds->contains('medico_id', $medicoId);
                $imgIndex = $medicoId % $fileCount;
                $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                $imgPath = 'profilePics/'.$imgIndex.'.svg';
            @endphp
            @if ($isSelected)
                <div class="flex justify-between items-center h-full">
                    <img class="h-14 w-14 flex-none rounded-full bg-gray-50" src="{{ asset($imgPath) }}" alt="">
                
                    <div class="min-w-0 flex-auto">
                        <p class="text-base font-semibold leading-6 px-5"> {{ Str::title($medico->nome) }} {{ Str::ucfirst($medico->sobrenome); }}</p>
                        <p class="mt-1 capitalize truncate text-sm leading-5 text-gray-500 px-5">
                            @php
                                $medico->especialidade = __('translations.'.$medico->especialidade);
                                $esp = $medico->especialidade;
                            @endphp
                            {{ $esp }} 
                        </p>
                    </div>
                
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <a href="{{ route('areapaciente.medicoDetalhes', ['id' => $medicoId]) }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Ver detalhes</a>
                    </div>
                </div>
            @endif
        @empty
            <div>
                <span>Sem médicos disponíveis</span>
            </div>
        @endforelse
            </table>
        </div>
    </div>
</div>