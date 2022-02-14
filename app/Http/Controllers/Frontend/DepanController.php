<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model;
use App\Model\Jenjang;
use App\Model\Kelas;
use App\Model\Mapel;
use App\Model\Soal;

class DepanController extends Controller
{
	public function __construct()
    {
        $this->data['jenjang']  = Model\Jenjang::orderBy('id')->get();
        $this->data['nama']     = 'Lembaga';
        $this->data['kel']    = Model\Kelas::orderBy('id')->get();
        $this->data['map']  	= Model\Mapel::orderBy('id')->get();
        $this->data['sol']     = Model\Soal::orderBy('id')->get();
    }

    public function layout()
    {
        $this->data['title'] = 'Daftar Jenjang';
		return view('layouts.frontend.main', $this->data);
    }

	public function index()
	{
		return view('depan.index', $this->data);
    }
    
    public function kelas($id)
    {
        $this->data['title'] = 'Data Seluruh Kelas';

        $this->data['kel'] = Kelas::where('jenjang_id', $id)->get();
        $this->data['breadcrumb_kel'] = Kelas::with('jenjang')->where('jenjang_id', $id)->get();
        // dd($this->data['breadcrumb_kel']);
        return view('depan.kelas.index', $this->data);
    }

    public function mapel($id)
    {
        $this->data['title'] = 'Data Mata Pelajaran';

        $this->data['mapel'] = Mapel::where('kelas_id', $id)->get();
        $this->data['breadcrumb_map'] = Mapel::with('kelas')->where('kelas_id', $id)->get();

        // dd($this->data['breadcrumb_map']);
        return view('depan.mapel.index', $this->data);
    }

    public function soal($id)
    {
        $this->data['title'] = 'Data Soal';

        /* $this->data['soalku'] = Soal::with('soal')->with('kelas')->where('mapel_id', $id)->paginate(10);
        Ket : 'soal' dan 'kelas' didapat dari perelasian di model Soal. Dan, di Model Kelas juga diberikan 
        relasi hasMany; Tapi untuk mendapatkan nilai yang sesuai harus menggunakan SQL Joins */

        $this->data['join'] = Jenjang
                                    ::join('tabel_kelas', 'tabel_jenjang.id', '=', 'tabel_kelas.jenjang_id')
                                    ->join('tabel_mapel', 'tabel_kelas.id', '=', 'tabel_mapel.kelas_id')
                                    ->join('tabel_soal', 'tabel_mapel.id', '=', 'tabel_soal.mapel_id')
                                    ->where('mapel_id', $id)
                                    ->get();

        /* Script join diatas ada untuk mengambil id dari masing-masing tabel untuk disamakan dengan fk dari tabel 
        relasinya. Disini ada empat tabel yakni jenjang, kelas, mapel, soal. */
    
        return view('depan.soal.index', $this->data);
    }
}
