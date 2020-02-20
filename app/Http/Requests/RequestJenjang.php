<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RequestJenjang extends FormRequest
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
            "nama_jenjang"                  => "required|unique:tabel_jenjang",
            "deskripsi_content"             => "required|min:5|max:200",
            "gambar_jenjang"                => "required",
        ];
    }

    public function messages()
    {
        return [
            'nama_jenjang.required'         => 'Nama Jenjang Harus Diisi',
            'nama_jenjang.unique'           => 'Nama Jenjang tidak boleh sama',
            'deskripsi_content.required'    => 'Deskripsi Jenjang Harus Diisi',
            'deskripsi_content.min:5'       => 'Karakter minimal 5',
            'deskripsi_content.max:100'     => 'Karakter maksimal 100',
            'gambar_jenjang.required'       => 'Gambar harus dipilih',
        ];
    }
}
