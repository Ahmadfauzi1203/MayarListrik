<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagihan extends FormRequest
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

            'id_penggunaan' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'jumlah_meter' => 'required',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tahun.required' => 'Tahun belum Diisi',
            'bulan.required' => 'Bulan belum Diisi',
            'jumlah_meter.required' => 'Jumlah Pemakaian Belum diisi',

        ];
    }
}
