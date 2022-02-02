<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RequestMapel extends FormRequest
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
            "nama_mapel"                    => "required|unique:tabel_mapel",
            "deskripsi_mapel"               => "required|min:5|max:200",
            "kelas_id"                      => "required",
        ];
    }

    public function messages()
    {
        return [
            'nama_mapel.required'           => 'Nama Mapel Harus Diisi',
            'nama_mapel.unique'             => 'Nama Mapel tidak boleh sama',
            'deskripsi_mapel.required'      => 'Deskripsi Mapel Harus Diisi',
            'deskripsi_mapel.min:5'         => 'Karakter minimal 5',
            'deskripsi_mapel.max:200'       => 'Karakter maksimal 100',
            'kelas_id.required'             => 'Kelas Harus Dipilih', 
        ];
    }
}
