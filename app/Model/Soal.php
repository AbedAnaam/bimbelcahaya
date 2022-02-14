<?php

namespace App\Model;
use App\Model\Kelas;
use App\Model\Mapel;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'tabel_soal';

    public function soal()
    {
        return $this->belongsTo('App\Model\Mapel', 'mapel_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Model\Kelas', 'mapel_id', 'id');
    }

    public function jenjang()
    {
        return $this->belongsTo('App\Model\Jenjang', 'jenjang_id', 'id');
    }
}
