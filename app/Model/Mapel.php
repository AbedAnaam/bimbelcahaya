<?php

namespace App\Model;
use App\Model\Kelas;
use App\Model\Soal;

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
        $rawdata = $query->with('Kelas')->orderBy('kelas_id', 'asc')->get()->toArray();
        // dd($rawdata);
        foreach ($rawdata as $key => $value) {
            $return[$value['id']] = $value['kelas']['nama_kelas'] . ' - ' . $value['nama_mapel'];
        }
        return $return;
    }
}
