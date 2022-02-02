<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RequestSoal extends FormRequest
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
            "nama_soal"                    => "required|unique:tabel_soal",
            "deskripsi_soal"               => "required|min:5|max:200",
            "isi_soal"                     => "required",
            "mapel_id"                     => "required",
        ];
    }

    public function messages()
    {
        return [
            'nama_soal.required'            => 'Nama Soal Harus Diisi',
            'nama_soal.unique'              => 'Nama Soal tidak boleh sama',
            'deskripsi_soal.required'       => 'Deskripsi Soal Harus Diisi',
            'deskripsi_soal.min:5'          => 'Karakter minimal 5',
            'deskripsi_soal.max:200'        => 'Karakter maksimal 100',
            'mapel_id.required'             => 'Mata Pelajaran Harus Dipilih', 
        ];
    }
}
