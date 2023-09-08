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
    <table class="customTable">
        <tr>
            <td>
                <img src="public/logo.png" alt="corpo humano" width="50px">
                Imagem de um corpo humano (nao ta funcionando ainda!!!)
                Deve ocupar essas 7 linhas, de forma com que esteja alinhado a cada parte do corpo
            </td>
            <td>
                Sintomas TOP
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas head</label>
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    @foreach ($symptomsHead as $symptomHead)
                        <option value="{{ $symptomHead['ID'] }}">{{ $symptomHead['Name'] }}</option>
                    @endforeach
                </select><br>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas torso</label>
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    @foreach ($symptomsTorso as $symptomTorso)
                        <option value="{{ $symptomTorso['ID'] }}">{{ $symptomTorso['Name'] }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas bracitos</label>
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    @foreach ($symptomsArms as $symptomArms)
                        <option value="{{ $symptomArms['ID'] }}">{{ $symptomArms['Name'] }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas perninhas</label>
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    @foreach ($symptomsLegs as $symptomLegs)
                        <option value="{{ $symptomLegs['ID'] }}">{{ $symptomLegs['Name'] }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas abdomem e bundinha</label>
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    @foreach ($symptomsAbdomen as $symptomAbdomen)
                        <option value="{{ $symptomAbdomen['ID'] }}">{{ $symptomAbdomen['Name'] }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas pele</label>
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    @foreach ($symptomsSkin as $symptomSkin)
                        <option value="{{ $symptomSkin['ID'] }}">{{ $symptomSkin['Name'] }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
</div>
