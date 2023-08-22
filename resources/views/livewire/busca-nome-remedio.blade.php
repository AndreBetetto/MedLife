<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <br>
    <br>
    <hr>
    O que a API carrega:
    {"content":[{"idProduto":70343,"numeroRegistro":"109630035","nomeProduto":"DIPIDOR","expediente":"2256745193","razaoSocial":"THEODORO F SOBRAL & CIA LTDA","cnpj":"06597801000162","numeroTransacao":"10020212019","data":"2019-09-25T11:11:56.000-0300","numProcesso":"250000157198935","idBulaPacienteProtegido":"eyJhbGciOiJIUzUxMiJ9.eyJqdGkiOiIxMTU1NDcxOCIsIm5iZiI6MTY5MjY0NDUyNiwiZXhwIjoxNjkyNjQ0ODI2fQ.Ae5k5Ph2zTl9hYgCJ_E2yhYrtX90r7Po9VJ8KOJmCXX9oy9NCm7YI1K3ZaD0Ilx0nUrkkBsb6PkBVq1Bghu7jQ","idBulaProfissionalProtegido":"eyJhbGciOiJIUzUxMiJ9.eyJqdGkiOiIxMTU1NDcxOSIsIm5iZiI6MTY5MjY0NDUyNiwiZXhwIjoxNjkyNjQ0ODI2fQ.K24baZM44x1-ilH8mo7DZLOG0L8xvpZN77ugQkIO1wuF4s4qFs3FRlkhz4CBzivOsoHBof7iGBt3ka5s3JYDIA","dataAtualizacao":"2023-08-21T08:00:35.000-0300"},{"idProduto":70347,"numeroRegistro":"110850018","nomeProduto":"DIPIFARMA","expediente":"4780073227","razaoSocial":"FARMACE INDÚSTRIA QUÍMICO-FARMACÊUTICA CEARENSE LTDA","cnpj":"06628333000146","numeroTransacao":"9337262022","data":"2022-10-04T15:09:55.000-0300","numProcesso":"253510231330013","idBulaPacienteProtegido":"eyJhbGciOiJIUzUxMiJ9.eyJqdGkiOiIxNzc1MzY4MSIsIm5iZiI6MTY5MjY0NDUyNiwiZXhwIjoxNjkyNjQ0ODI2fQ.4yeBucTcL419t5nt0eDTz2OFOrqf1SRHhgrUbmNHaID91Zp_cgUnTxYOh-1ArZRRfUoe7oRWDf40WEMP8AiWDA","idBulaProfissionalProtegido":"eyJhbGciOiJIUzUxMiJ9.eyJqdGkiOiIxNzc1MzY4MiIsIm5iZiI6MTY5MjY0NDUyNiwiZXhwIjoxNjkyNjQ0ODI2fQ.FbzoV7310AcrDeZSUv5Nwp2MKP_kPfLJmfJkCqCGKQvzXzoKC3N7BjirJpz77PkpbrAnoI3_idKdoeVB60S0mA","dataAtualizacao":"2023-08-21T08:00:35.000-0300"},
    <br>
    <hr>
    <br>

    <div>
        <label for="query">Search Medicine:</label>
        <input type="text" wire:model="query" wire:keyup="search">
    </div>

    @if($retorno != "")
        @php
            $novoValor = json_decode($retorno, true);
            $count = 0;
        @endphp
        @foreach ($novoValor as $items)
            @php
                $count++;
            @endphp

            {{ $novoValor['content'][$count]['nomeProduto'] }}
            <br>
            {{ $novoValor['content'][$count]['razaoSocial'] }}

            @php
                $medicine = $novoValor['content'][$count]['nomeProduto'];
                $id = $novoValor['content'][$count]['idBulaPacienteProtegido'];
                $link =  'https://consultas.anvisa.gov.br/api/consulta/medicamentos/arquivo/bula/parecer/'.$id.'/?Authorization=';

                $headers = get_headers($link);
                $isValidUrl = strpos($headers[0], '200 OK') !== false;

                $valorPpassar = $medicine . "@" . $link;
            @endphp
            @if ($isValidUrl)
                Link Download: <a href="{{ $link }}">Download</a>
            @else
                File not found or unavailable for download.
            @endif
            <br>
            <button wire:click="addMedicine('{{ $medicine['link'] }}')">Copy Link</button>
            <br>
            <hr>
            <br>
        @endforeach
        
    @else
        <p>No results!</p>
    @endif
</div>
