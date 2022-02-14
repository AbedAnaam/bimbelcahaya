<?php

namespace App\Http\Controllers\Belakang;

use App\Model\Soal;
use App\Model\Mapel;
use App\Model\Kelas;
use App\Model\Jenjang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $soal = Soal::select(['id','mapel_id','nama_soal','isi_soal','deskripsi_soal']);
                return DataTables::of($soal)
                ->addColumn('action', function($soal){
                    return view('belakang.soal._action', [
                        'model'         => $soal,
                        'form_url'      => route('soal.destroy', $soal->id),
                        'edit_url'      => route('soal.edit', $soal->id)]);
                })
                ->addColumn('deskripsi_soal', function($soal){
                    return strip_tags($soal->deskripsi_soal);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'nama_soal', 'name'=>'nama_soal', 'title'=>'Nama Soal'])
            ->addColumn(['data'=>'mapel_id', 'name'=>'mapel_id', 'title'=>'ID Mata Pelajaran'])
            ->addColumn(['data'=>'isi_soal', 'name'=>'isi_soal', 'title'=>'Isi Soal'])
            ->addColumn(['data'=>'deskripsi_soal', 'name'=>'deskripsi_soal', 'title'=>'Deskripsi Soal'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        
        return view('belakang.soal.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mapel'] = Mapel::SelectBox();
        
        return view('belakang.soal.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            "nama_soal"                    => "required|unique:tabel_soal",
            "deskripsi_soal"               => "required|min:5|max:200",
            "isi_soal"                     => "required",
            "mapel_id"                     => "required",
        ])->validate();

        $new_soal = new Soal;

        $new_soal->nama_soal = $request->get('nama_soal');
        $new_soal->deskripsi_soal = $request->get('deskripsi_soal');
        $new_soal->isi_soal = $request->get('isi_soal');
        $new_soal->mapel_id = $request->get('mapel_id');

        // Disini proses mendapatkan judul dan memindahkan letak file ke folder tertentu
        if ($request->get('isi_soal')){
            $isi_soal   = $file->getClientOriginalName();
            $request->file('isi_soal')->move('uploads/soal/', 'public', $isi_soal);
            $new_soal->isi_soal = $isi_soal;
        }

        $file       = $request->file('isi_soal');
        $fileName   = $file->getClientOriginalName();
        $request->file('isi_soal')->move("uploads/soal/", $fileName);
        $new_soal->isi_soal = $fileName;

        $new_soal->save();
        return redirect()->route('soal.index')->with('status', 'Data Soal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Soal::findOrFail($id);
        return view('belakang.soal.edit',['soal'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "nama_soal"             => "required",
            "isi_soal"              => "required",
            "deskripsi_soal"       => "required|min:5|max:200",
        ])->validate();

        $soal = Soal::findOrFail($id);

        $soal->nama_soal = $request->get('nama_soal');

        if ($request->get('isi_soal')){
            $isi_soal   = $file->getClientOriginalName();
            $request->file('isi_soal')->move('uploads/soal/', 'public', $isi_soal);
            $new_soal->isi_soal = $isi_soal;
        }

        $file       = $request->file('isi_soal');
        $fileName   = $file->getClientOriginalName();
        $request->file('isi_soal')->move("uploads/soal/", $fileName);
        $soal->isi_soal = $fileName;

        $soal->deskripsi_soal = $request->get('deskripsi_soal');

        $soal->save();

        return redirect()->route('soal.index')->with('status', 'Data Soal berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();
        return redirect()->route('soal.index')->with('status', 'Soal berhasil dihapus!');
    }
}
