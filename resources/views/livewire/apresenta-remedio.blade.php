<div>
    <div wire:init = 'init'> 
        @if($isLoading)
        <div id="loadesh1" wire:ignore>
            @for ($i = 0; $i < $count; $i++)
                @if (isset($medNomes[$i]))
                {{ $medNomes[$i] }}
                &nbsp; &nbsp;

                <label>
                    <input type="checkbox" class=""/>
                    <span>06h</span>&nbsp; &nbsp;
                </label>

                <label>
                    <input type="checkbox" class=""/>
                    <span>08h</span> &nbsp; &nbsp;
                </label>

                <label>
                    <input type="checkbox" class=""/>
                    <span>10h</span>&nbsp; &nbsp;
                </label>

                <br><br>
                @endif
            @endfor
        </div>
        @else
            Carregando dados...
        @endif

    </div>
    <div class="my-5 col-span-2 h-px w-full bg-black"></div>
    <div class="mt-5 col-span-2 flex justify-center">
        <button class=" bg-purple-300 border-purple-500 text-sm border-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 py-1 px-2 rounded " type="button"
        @if (!$isLoading)
            disabled 
        @else 
            enabled
        @endif>
            <input wire:submit.prevent="submitForm" type="submit" name="ENVIAR" 
            @if (!$isLoading)
                disabled 
            @else 
                enabled 
            @endif>
     </button>
    </div>
</div>
