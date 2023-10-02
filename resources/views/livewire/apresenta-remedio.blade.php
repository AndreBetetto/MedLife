<div>
    <div wire:init = 'init'>
               
                    
                
            
        </div>
        @if($isLoading)
            <div id="loadesh1" wire:ignore>
                @for ($i = 0; $i < $count; $i++)
                    @if (isset($medNomes[$i]) || $medNomes[$i] != [] || $medNomes[$i] != null)
                    {{ $medNomes[$i] }}
                    &nbsp; &nbsp;
                    <label>
                        <input type="checkbox" class=""/>
                        <span>08h</span> &nbsp; &nbsp;
                    </label>

                    <label>
                        <input type="checkbox" class=""/>
                        <span>10h</span>&nbsp; &nbsp;
                    </label>

                    <label>
                        <input type="checkbox" class=""/>
                        <span>12h</span>&nbsp; &nbsp;
                    </label>
                    <br><br>
                    @endif
                @endfor
            </div>
        @else
            Carregando dados...
        @endif
    </div>
</div>
