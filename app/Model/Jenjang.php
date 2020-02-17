<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    protected $table = "tabel_jenjang";

    public function kelas()
    {
        return $this->belongsTo('kelas');
    }
}
