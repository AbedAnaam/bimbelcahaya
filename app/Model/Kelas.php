<?php

namespace App\Model;
use App\Model\Mapel;

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

    public function scopeSelectBox($query, $id)
    {
        $return = array();
        // $this->data['mapel'] = Mapel::with('Kelas')->where('kelas_id', $id)->get();
        $data = Mapel::with('Kelas')->where('kelas_id', $id)->get()->toArray();
        // $data = $query->orderBy('id','desc')->get()->toArray();
        // $coba = $query->orderBy('id','desc')->get()->toArray();
        foreach ($data as $key => $value) {
            $return[$value['id']] = $value['nama_kelas'];
        }
        return $return;
    }
}
