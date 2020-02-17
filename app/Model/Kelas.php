<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "tabel_kelas";

    public function jenjang()
    {
        return $this->hasMany('Jenjang');
    }
}
