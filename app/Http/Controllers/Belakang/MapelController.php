<?php

namespace App\Http\Controllers\Belakang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

use App\Model\Mapel;
use App\Model\Kelas;
use App\Model\Soal;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $mapel = Mapel::select(['id','kelas_id','nama_mapel','gambar_mapel','deskripsi_mapel']);
            // $jenjang = Jenjang::select(['id','nama_jenjang','deskripsi_content']);
                return DataTables::of($mapel)
                ->addColumn('action', function($mapel){
                    return view('belakang.mapel._action', [
                        'model'         => $mapel,
                        'form_url'      => route('mapel.destroy', $mapel->id),
                        'edit_url'      => route('mapel.edit', $mapel->id)]);
                        // 'show_url'      => route('jenjang.show', $jenjangs->id)]);
                })
                ->addColumn('deskripsi_mapel', function($mapel){
                    return strip_tags($mapel->deskripsi_mapel);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'nama_mapel', 'name'=>'nama_mapel', 'title'=>'Nama Mapel'])
            ->addColumn(['data'=>'gambar_mapel', 'name'=>'gambar_mapel', 'title'=>'Gambar Mapel'])
            // ->addColumn(['data'=>'nama_jenjang', 'name'=>'nama_jenjang', 'title'=>'Tingkat'])
            ->addColumn(['data'=>'deskripsi_mapel', 'name'=>'deskripsi_mapel', 'title'=>'Deskripsi Mapel'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        
        return view('belakang.mapel.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['kelas'] = Kelas::SelectBox();
        return view('belakang.mapel.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestMapel $request)
    {
        \Validator::make($request->all(),[
            "nama_mapel"                    => "required|unique:tabel_mapel",
            "deskripsi_mapel"               => "required|min:5|max:200",
            "gambar_mapel"                  => "required",
            "kelas_id"                      => "required",
        ])->validate();

        $new_mapel = new Mapel;

        $new_mapel->nama_mapel = $request->get('nama_mapel');
        $new_mapel->deskripsi_mapel = $request->get('deskripsi_mapel');
        $new_mapel->kelas_id = $request->get('kelas_id');

        if ($request->file('gambar_mapel')) {
            $file = $request->file('gambar_mapel')->store('image-mapel', 'public');
            $new_mapel->gambar_mapel = $file;
        }

        $new_mapel->save();
        return redirect()->route('mapel.index')->with('status', 'Data Mata Pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        if($request->file('gambar_mapel')){
            if ($mapel->gambar_mapel && file_exists(storage_path('app/public/' . $mapel->gambar_mapel))) {
                \Storage::delete('public/' . $mapel->gambar_mapel);
            }
            $file = $request->file('gambar_mapel')->store('image-mapel', 'public');
            $mapel->gambar_mapel = $file;
        }

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
