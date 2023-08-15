<div>
    {{-- In work, do what you enjoy. --}}

    <hr>
        COLOCAR ESSA BOMBA EM MODAL no botao add medico
        <div>
            <form action="{{ route('adminmedico.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                nome:
                <input type="text" id="nome" name="nome" ><br>
                sobrenome:
                <input type="text" id="sobrenome" name="sobrenome" ><br>
                data nascimento:
                <input type="date" id="dataNasc" name="dataNasc" ><br>
                sexo:
                <input type="text" id="sexo" name="sexo" ><br>
                cpf:
                <input type="number" id="cpf" name="cpf" ><br>
                rg:
                <input type="number" id="rg" name="rg" ><br>
                fone:
                <input type="number" id="fone" name="fone" ><br>
                Estado civil:
                <input type="text" id=" estadoCivil" name="estadoCivil" ><br>
                especialidade:
                <input type="text" id="especialidade" name="especialidade" ><br>
                crm:
                <input type="number" id="crm" name="crm" ><br>
                id_user:
                <input type="number" id="user_id" name="crm" ><br>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </form>
        </div>
    <hr>

    <table>
        <th> Medicos</th>
        <tr>
            <td>id</td>
            <td>nome</td>
            <td>sobrenome</td>
            <td>fone</td>
            <td>crm</td>
            <td>sexo</td>
            <td>especialidade</td>
        </tr>
        <tr>
            @forelse ($medicos as $medicos)
        
            <td>{{$medicos->id}}</td>
            <td>{{$medicos->nome}}</td>
            <td>{{$medicos->sobrenome}}</td>
            <td>{{$medicos->fone}}</td>
            <td>{{$medicos->crm}}</td>
            <td>{{$medicos->sexo}}</td>
            <td>{{$medicos->especialidade}}</td>

            @empty
                <td rowspan="7">sem registro</td>
            @endforelse
        </tr>
    </table>
    
</div>
