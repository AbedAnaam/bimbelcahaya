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
        $this->data['kelas']    = Model\Kelas::orderBy('id')->get();
        $this->data['mapel']  	= Model\Mapel::orderBy('id')->get();
        $this->data['soal']     = Model\Soal::orderBy('id')->get();
    }

    public function layout()
    {
        $this->data['title'] = 'Daftar Jenjang';
		return view('layouts.frontend.main', $this->data);
    }

	public function index()
	{
        $this->data['title'] = 'Daftar Jenjang';
		return view('depan.index', $this->data);
    }
    
    public function kelas($id)
    {
        $this->data['title'] = 'Data Kelas';
        // $this->data['kelas'] = Kelas::paginate(15);
        $this->data['kelas'] = Kelas::where('jenjang_id', $id)->get();

        // $this->data['kelas'] = Kelas::where('jenjang_id', $id)->with('jenjang')->get();
        // dd($this->data['jenjang']);
        return view('depan.kelas.index', $this->data);
    }

    public function mapel($id)
    {
        $this->data['title'] = 'Data Mata Pelajaran';
        // $this->data['mapel'] = Mapel::paginate(15);
        $this->data['mapel'] = Mapel::where('kelas_id', $id)->get();

        // $this->data['kelas'] = Kelas::where('jenjang_id', $id)->with('jenjang')->get();
        // dd($this->data['jenjang']);
        return view('depan.mapel.index', $this->data);
    }

    public function soal($id)
    {
        $this->data['title'] = 'Data Soal';
        // $this->data['mapel'] = Mapel::paginate(15);
        $this->data['soal'] = Soal::where('mapel_id', $id)->get();

        // $this->data['kelas'] = Kelas::where('jenjang_id', $id)->with('jenjang')->get();
        // dd($this->data['jenjang']);
        return view('depan.soal.index', $this->data);
    }

    // public function list_soal($id)
    // {
    //     $this->data['title'] = 'Daftar Latihan Soal';
    //     // $this->data['mapel'] = Mapel::paginate(15);
    //     $this->data['list_soal'] = Soal::where('mapel_id', $id)->get();
    //     dd ($this->data['list_soal']);

    //     // $this->data['kelas'] = Kelas::where('jenjang_id', $id)->with('jenjang')->get();
    //     // dd($this->data['jenjang']);
    //     return view('depan.list_soal.index', $this->data);
    // }
}
