<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *  @return bool
     */
   


    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'sobrenome' => 'required',
            'dataNasc' => 'required',
            'sexo' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'fone' => 'required',
            'estadoCivil' => 'required',
            'profissao' => 'required',
            'user_id' => 'required'
        ];
    }


}
