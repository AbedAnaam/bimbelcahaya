<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    protected $table = "tabel_jenjang";

    public function kelas()
    {
        return $this->hasMany('App\Model\Kelas','jenjang_id', 'id');
    }

    public function scopeSelectBox($query)
    {
        $return = array();
        $data = $query->orderBy('id','asc')->get()->toArray();
        foreach ($data as $key => $value) {
        	$return[$value['id']] = $value['nama_jenjang'];
        }
        return $return;
    }
}
