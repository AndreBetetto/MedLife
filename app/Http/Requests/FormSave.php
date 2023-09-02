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
            'paciente_id' => 'required', //
            'medico_id' => 'required', //
            'forms_id' => 'required', //
            'nivelDor' => 'required', //
            'nivelFebre' => 'required', //
            'sintomas' => 'required', //
            'sangramento' => 'required',
            'observacoes' => 'required', //
            'numDia' => 'required',
            'status' => 'required', //
            'medicamentos' => 'required', //
            'prioridadeMedico' => 'required', //
            'grupo' => 'required', //
            'tipo' => 'required', //
            'alergias' => 'required', //
            'diagnostico' => 'required' //
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * 
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'paciente_id.required' => 'O campo paciente_id é obrigatório',
            'medico_id.required' => 'O campo medico_id é obrigatório',
            'forms_id.required' => 'O campo forms_id é obrigatório',
            'nivelDor.required' => 'O campo nivelDor é obrigatório',
            'nivelFebre.required' => 'O campo nivelFebre é obrigatório',
            'sintomas.required' => 'O campo sintomas é obrigatório',
            'sangramento.required' => 'O campo sangramento é obrigatório',
            'observacoes.required' => 'O campo observacoes é obrigatório',
            'numDia.required' => 'O campo numDia é obrigatório',
            'status.required' => 'O campo status é obrigatório',
            'medicamentos.required' => 'O campo medicamentos é obrigatório',
            'prioridadeMedico.required' => 'O campo prioridadeMedico é obrigatório',
            'grupo.required' => 'O campo grupo é obrigatório',
            'tipo.required' => 'O campo tipo é obrigatório',
            'alergias.required' => 'O campo alergias é obrigatório',
            'diagnostico.required' => 'O campo diagnostico é obrigatório'
        ];
    }
}
