<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <br><br>

    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-semibold leading-7 text-gray-900">Relatório</h3>
    </div><br>

    <div class="h-px bg-gray-300"></div>
    
    <div class="grid grid-cols-2 gap-4 py-10">
    <div>
        <label for="selectedDay" class="font-bold text-gray-700">Selecione o dia &nbsp;</label>
        <select
            placeholder="Select one"
            wire:model="selectedDay"
            class="border rounded border-gray-400 w-3/4">
            @for ($i = 1; $i <= $totalDays; $i++)
                @if ($i <= $diaMaxRespondido)
                    <option value="{{ $i }} " selected>{{ $i }}</option>
                @else
                    <option value="{{ $i }} " disabled>{{ $i }}</option>
                @endif
            @endfor
        </select>
    </div>

    <div>
        <label class="font-bold text-gray-700">Nível da dor</label>
        <input type="text" value="{{ $formDia->nivelDor }}" class="mx-3 border rounded w-3/4 p-2  border-gray-400" disabled>
    </div>

    <div>
        <label class="font-bold text-gray-700">Nível da febre</label>
        <input type="text" value="{{ $formDia->nivelFebre }}" class="mx-3 border rounded p-2 w-3/4  border-gray-400" disabled>
    </div>
    
    <div>
        <label class="font-bold text-gray-700">Sintomas</label>
        <input type="text" value="{{ $formDia->sintomas }}" class="mx-8 border rounded p-2 w-3/4  border-gray-400" disabled>
    </div>

    <div>
        <label class="font-bold text-gray-700">Sangramento</label>
        <input type="text" value="{{ $formDia->sangramento }}" class="mx-4 border rounded p-2 w-3/4  border-gray-400" disabled>
    </div>

    <div>
        <label class="font-bold text-gray-700">Observações</label>
        <input type="text" value="{{ $formDia->observacoes }}" class="mx-3 border rounded p-2 w-3/4  border-gray-400" disabled>
    </div>
</div>

    
    <div class="h-px bg-gray-300"></div>

    <button wire:click="getSymptoms" disabled></button>
    <a href="{{ $testeurl }}" class="inline-block rounded bg-purple-400 my-3 px-3 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-purple-300 transition duration-150 ease-in-out hover:bg-purple-500 hover:shadow-purple-600 focus:outline-none focus:ring-0">Ver sintomas</a>
    {{-- Sintomas API --}}
    Sintomas
        @foreach ($symptoms as $symptom)
            <li>{{ $symptom['Name'] }}</li>
        @endforeach
</div>
