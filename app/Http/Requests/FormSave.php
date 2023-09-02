<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSave extends FormRequest
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
            'forms_id' => 'required',
            'nivelDor' => 'required',
            'nivelFebre' => 'required',
            'sintomas' => 'required',
            'sangramento' => 'required',
            'observacoes' => 'required',
            'numDia' => 'required',
            'status' => 'required',
            'medicamentos' => 'required',
            'prioridadeMedico' => 'required',
            'grupo' => 'required',
            'tipo' => 'required',
            'alergias' => 'required',
            'diagnostico' => 'required'
        ];
    }
}
