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


    
    <!-- Add a button to trigger the API request -->
    <button wire:click.prevent="fetchAPIdata">Fetch Data</button>
    @php
        if($isLoading === true){
            echo '<div class="loading-spinner"></div>';
        }
    @endphp
    <!-- Display a loading spinner while the API request is in progress -->
    <br><br><br><br>
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
                <select id="symHead" wire:model="selectedSymptomHead" multiple>
=                    @foreach ($symptomsHead as $symptomHead)
                        <option value="{{ $symptomHead['ID'] }}">{{ $symptomHead['Name'] }}</option>
                    @endforeach
                    
                </select>
                <script>
                    new MultiSelectTag('symHead')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symHead', {
                            shadow: true,
                            placeholder: 'Sintomas da cabeca'  // default Search...
                        })  // id
                    </script>
                @endif
                <br>
                <div>
                    @foreach ($selectedSymptomHead as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas torso</label>
                <select id="symTorso" wire:model="selectedSymptomTorso" multiple>
                    @foreach ($symptomsTorso as $symptomTorso)
                        <option value="{{ $symptomTorso['ID'] }}">{{ $symptomTorso['Name'] }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symTorso')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symTorso')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomTorso as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas bracitos</label>
                <select id="symArms" wire:model="selectedSymptomArms" multiple>
                    @foreach ($symptomsArms as $symptomArms)
                        <option value="{{ $symptomArms['ID'] }}">{{ $symptomArms['Name'] }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symArms')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symArms')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomArms as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas perninhas</label>
                <select id="symLegs" wire:model='selectedSymptomLegs' multiple>
                    @foreach ($symptomsLegs as $symptomLegs)
                        <option value="{{ $symptomLegs['ID'] }}">{{ $symptomLegs['Name'] }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symLegs')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symLegs')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomLegs as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas abdomem e bundinha</label>
                <select id="symAbdomem" wire:model='selectedSymptomAbdomen' multiple>
                    @foreach ($symptomsAbdomen as $symptomAbdomen)
                        <option value="{{ $symptomAbdomen['ID'] }}">{{ $symptomAbdomen['Name'] }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symAbdomem')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symAbdomem')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomAbdomen as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td>
                .
            </td>
            <td>
                <label>Select sintomas pele</label>
                <select id="symSkin" wire:model='selectedSymptomSkin' multiple>
                    @foreach ($symptomsSkin as $symptomSkin)
                        <option value="{{ $symptomSkin['ID'] }}">{{ $symptomSkin['Name'] }}</option>
                    @endforeach
                </select>
                <script>
                    new MultiSelectTag('symSkin')  // id
                </script>
                @if ($dataFetched == true)
                    <script>
                        new MultiSelectTag('symSkin')  // id
                    </script>
                @endif<br>
                <div>
                    @foreach ($selectedSymptomSkin as $symptomId => $symptomName)
                        <span class="selected-symptom">
                            {{ $symptomName }}
                            <button wire:click="removeSelectedSymptom('{{ $symptomId }}')" class="remove-button">Remove</button>
                        </span>
                    @endforeach
                </div>
            </td>
        </tr>
    </table>
    @foreach ($selectedSymptomHead as $symptomId => $symptomName)
        <span class="selected-symptom">
            {{ $symptomName }}
            <button wire:click="removeSelectedSymptomHead('{{ $symptomId }}')" class="remove-button">Remove</button>
        </span>
    @endforeach
    <input type="text" name="selectedSymptoms" wire:model="selectedSymptomHead">
</div>
