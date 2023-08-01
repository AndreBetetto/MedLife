<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="lm-3">
        @foreach ($medico as $medico)
            <div>
                Médico: {{ $medico->nome }} <br>
                CRM: {{ $medico->crm }} <br>
                Especialidade: {{ $medico->especialidade }} <br><br><hr>
            </div>
        @endforeach
    </div>
</div>
