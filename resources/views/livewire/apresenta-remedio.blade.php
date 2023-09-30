<div>
    <div wire:init = 'init'>
    @if ($arrayMedicamentos['nomeComercial'] != [])
        {{ $arrayMedicamentos['nomeComercial'] }}
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
    @endif
    </div>
</div>
