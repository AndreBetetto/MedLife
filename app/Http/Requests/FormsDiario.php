<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsDiario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
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
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'observacoes' => 'required',
            'status' => 'required',
            'medicamentos' => 'required',
            'diagnostico' => 'required',
            'numDias' => 'required' //outra tabela
        ];
    }
}
