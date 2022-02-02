<?php

namespace App\Http\Controllers\Belakang;

use App\Model\Mapel;
use App\Model\Kelas;
use App\Model\Soal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $this->data['title'] = 'Daftar Seluruh Mata Pelajaran';
        $this->data['kelas'] = Kelas::orderBy('id','asc')->get();

        return view('belakang.mapel.dashboard', $this->data);
    }

    public function tambah($id)
    {
        $this->data['mapel'] = Mapel::with('Kelas')->where('kelas_id', $id)->get()->first();

        return view('belakang.mapel.create', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->data['joinkelas'] = Mapel::join('tabel_kelas', 'tabel_mapel.kelas_id', '=', 'tabel_mapel.id')
        //                         ->get(['tabel_mapel.kelas_id', 'tabel_kelas.nama_kelas']);

        $this->data['mapel'] = Mapel::with('Kelas')->where('kelas_id', 'id')->get();
        // $this->data['kelas'] = Kelas::with('Mapel')->where('jenjang_id', $id)->get();
        // dd($this->data['mapel']);
        // $this->data['mapel'] = Mapel::find(1);
        // dd($kelas->kelas->nama_kelas); 
       // <-- sek marai sak jose boskuu
        
        return view('belakang.mapel.create', $this->data );
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
            "nama_mapel"                    => "required|unique:tabel_mapel",
            "deskripsi_mapel"               => "required|min:5|max:200",
            "kelas_id"                      => "required",
        ])->validate();

        $new_mapel = new Mapel;

        $new_mapel->nama_mapel = $request->get('nama_mapel');
        $new_mapel->deskripsi_mapel = $request->get('deskripsi_mapel');
        $new_mapel->kelas_id = $request->post('kelas_id');

        $new_mapel->save();

        return redirect()->route('mapel.index')->with('status', 'Data Mata Pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Builder $htmlBuilder, $id)
    {
        $this->data['mapel'] = Mapel::where('kelas_id', $id)->get();
        $this->data['mpl'] = Mapel::where('kelas_id', $id)->get()->first();

        if ($request->ajax()) {
            $mapel = Mapel::where('kelas_id', $id)->get();
                return DataTables::of($mapel)
                ->addColumn('action', function($mapel){
                    return view('belakang.mapel._action', [
                        'model'         => $mapel,
                        'form_url'      => route('mapel.destroy', $mapel->id),
                        'edit_url'      => route('mapel.edit', $mapel->id)]);
                })
                ->addColumn('deskripsi_mapel', function($mapel){
                    return strip_tags($mapel->deskripsi_mapel);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'nama_mapel', 'name'=>'nama_mapel', 'title'=>'Nama Mapel'])
            ->addColumn(['data'=>'deskripsi_mapel', 'name'=>'deskripsi_mapel', 'title'=>'Deskripsi Mapel'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        
        return view('belakang.mapel.index', $this->data)->with(compact('html'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Mapel::findOrFail($id);
        return view('belakang.mapel.edit',['mapel'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "nama_mapel"          => "required",
            "deskripsi_mapel"       => "required|min:5|max:200",
        ])->validate();

        $mapel = Mapel::findOrFail($id);

        $mapel->nama_mapel = $request->get('nama_mapel');
        $mapel->deskripsi_mapel = $request->get('deskripsi_mapel');

        $mapel->save();

        return redirect()->route('mapel.edit', $mapel->id)->with('status', 'Data Mata Pelajaran berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->route('mapel.index')->with('status', 'Mata Pelajaran berhasil dihapus!');
    }
}
