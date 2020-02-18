<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'tabel_soal';

    public function soal()
    {
        return $this->belongsTo('App\Model\Mapel', 'mapel_id', 'id');
    }
}
