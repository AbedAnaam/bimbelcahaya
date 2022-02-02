<?php

namespace App\Model;
use App\Model\Kelas;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = "tabel_mapel";

    public function kelas()
    {
        return $this->belongsTo('App\Model\Kelas', 'kelas_id', 'id');
    }

    public function soal()
    {
        return $this->hasMany('App\Model\Mapel','mapel_id', 'id');
    }

    public function scopeSelectBox($query)
    {
        $return = array();
        $data = $query->orderBy('id','desc')->get()->toArray();
        foreach ($data as $key => $value) {
            $return[$value['id']] = $value['nama_mapel'];
        }
        return $return;
    }
}
