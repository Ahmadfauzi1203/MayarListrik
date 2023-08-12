<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelanggan extends FormRequest
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
            'nama_pelanggan' => 'required',
            'nomor_kwh' => 'required|digits:12|unique:pelanggan',
            'alamat' => 'required',
            'id_tarif' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'nama_pelanggan.required' => 'Nama pelanggan belum Diisi',
            'nomor_kwh.unique' => 'Nomor KWH sudah terdaftar',
            'nomor_kwh.required' => 'Nomor KWH belum Diisi',
            'nomor_kwh.digits' => 'Nomor KWH Harus 12 Digit',
            'alamat.required' => 'Alamat belum Diisi',
            'id_tarif.required' => 'Tarif belum Diisi'
        ];
    }
}
