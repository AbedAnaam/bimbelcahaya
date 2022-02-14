<?php

namespace App\Model;
use App\Model\Mapel;
use App\Model\Kelas;
use App\Model\Soal;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "tabel_kelas";

    public function jenjang()
    {
        return $this->belongsTo('App\Model\Jenjang','jenjang_id','id');
    }

    public function mapel()
    {
        return $this->hasMany('App\Model\Mapel','kelas_id', 'id');
    }

    public function soal()
    {
        return $this->hasMany('App\Model\Soal','mapel_id', 'id');
    }

    public function scopeSelectBox($query)
    {
        $return = array();
        $id = Kelas::get(); // mendapatkan id dari tabel kelas saja

        // $test = Mapel::with('Kelas')->where('kelas_id', $id)->get()->toArray(); // nilai null [ ]

        $data = $query->with('Mapel')->orderBy('id','asc')->get()->toArray();
        // dd($id);

        foreach ($data as $key => $value) {
            $return[$value['id']] = $value['nama_kelas'];
        }
        return $return;
    }
}
