<div>
    @php
        $body = [
            'head' => 'Cabeça, garganta e pescoço',
            'torso' => 'Tórax e costas',
            'arms' => 'Braços e ombros',
            'abdomen' => 'Abdômen, pelve e nádegas',
            'legs' => 'Pernas',
            'skin' => 'Pele, articulações e geral'
        ];
        $idcabeca = 6;
        $idtorso = 15;
        $idbraco = 7;
        $idabdomen = 16;
        $idperna = 10;
        $idpele = 17;        


    @endphp

    <div>
        <h2>Sintomas gerais:</h2>
        <ul>
            @foreach ($symptoms as $symptom)
                <li>{{ $symptom['Name'] }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div>
        <h2>Sintomas da cabeca:</h2>
        <ul>
            @foreach ($symptomsHead as $symptomHead)
                <li>{{ $symptomHead['Name'] }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div>
        <h2>Sintomas do torso:</h2>
        <ul>
            @foreach ($symptomsTorso as $symptomTorso)
                <li>{{ $symptomTorso['Name'] }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div>
        <h2>Sintomas do braco:</h2>
        <ul>
            @foreach ($symptomsArms as $symptomArm)
                <li>{{ $symptomArm['Name'] }}</li>
            @endforeach
        </ul>
    </div>
    
    <br>
    ID: 06 - Cabeça, garganta e pescoço<br>
    ID: 15 - Tórax e costas<br>
    ID: 07 - Braços e ombros<br>
    ID: 16 - Abdômen, pelve e nádegas<br>
    ID: 10 - Pernas<br>
    ID: 17 - Pele, articulações e geral<br>
    <br>
</div>
