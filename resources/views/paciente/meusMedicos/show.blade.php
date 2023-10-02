<div>
    {{-- The whole world belongs to you. --}}
    <table>

        <div class="px-4 sm:px-0">
            <h3 class="text-xl font-semibold leading-7 text-gray-900 p-5">Meus médicos</h3>
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

        @forelse ($medicos as $medico)
            @php
                $medicoId = $medico->id;
                $isSelected = $pacMeds->contains('medico_id', $medicoId);
                $imgIndex = $medicoId % $fileCount;
                $imgIndex = $imgIndex == 0 ? $fileCount : $imgIndex;
                $imgPath = 'profilePics/'.$imgIndex.'.svg';
            @endphp
            @if ($isSelected)
            <div class="w-full h-px bg-gray-300"></div>
                <div class="flex justify-between items-center h-fit py-10 px-5">
                <img class="h-20 w-20 flex-none rounded-full bg-gray-50" src="{{asset($imgPath)}}" alt="imagem carrega">
                
                <div class="min-w-0 flex-auto px-8">
                    <p class="text-base font-semibold leading-6 text-gray-900"> {{ $medico->nome}} {{ Str::ucfirst($medico->sobrenome); }}</p>
                    <p class="mt-1 truncate text-sm leading-5 text-gray-500">  {{ $medico->especialidade }} </p>
                </div>
                
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <a href="{{ route('areapaciente.medicoDetalhes', ['id' => $medicoId]) }}" class="inline-block rounded bg-purple-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:bg-primary-600 focus:outline-none focus:ring-0">Ver detalhes</a>
                </div>

                <td>  
                </td>
            @endif
        @empty
            <tr>
                <td colspan="4">No doctors available</td>
            </tr>
        @endforelse
    </table>
</div>