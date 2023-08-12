<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTarif extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'daya' => 'required',
            'tarifperkwh' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'daya.required' => 'Daya belum Diisi',
            'daya.unique' => 'Daya sudah terdaftar',
            'tarifperkwh.required' => 'Tarif belum Diisi',
        ];
    }
}
