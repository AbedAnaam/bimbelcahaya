<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RequestKelas extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nama_kelas"                    => "required|unique:tabel_kelas",
            "deskripsi_kelas"               => "required|min:5|max:200",
            "jenjang_id"                    => "required",
        ];
    }

    public function messages()
    {
        return [
            'nama_kelas.required'           => 'Nama Kelas Harus Diisi',
            'nama_kelas.unique'             => 'Nama Kelas Sudah Pernah Digunakan',
            'deskripsi_kelas.required'      => 'Deskripsi Kelas Harus Diisi',
            'deskripsi_kelas.min:5'         => 'Minimal Karakter adalah 5',
            'deskripsi_kelas.max:200'       => 'Maksimal Karakter adalah 200',
            'jenjang_id.required'           => 'Jenjang Harus Dipilih', 
        ];
    }
}
