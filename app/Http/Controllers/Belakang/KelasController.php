<?php

namespace App\Http\Controllers\Belakang;

use App\Model\Kelas;
use App\Model\Jenjang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $kelas = Kelas::select(['id','jenjang_id','nama_kelas','deskripsi_kelas']);
                return DataTables::of($kelas)
                ->addColumn('action', function($kelas){
                    return view('belakang.kelas._action', [
                        'model'         => $kelas,
                        'form_url'      => route('kelas.destroy', $kelas->id),
                        'edit_url'      => route('kelas.edit', $kelas->id)]);
                        // 'show_url'      => route('jenjang.show', $jenjangs->id)]);
                })
                ->addColumn('deskripsi_kelas', function($kelas){
                    return strip_tags($kelas->deskripsi_kelas);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'nama_kelas', 'name'=>'nama_kelas', 'title'=>'Nama Kelas'])
            ->addColumn(['data'=>'deskripsi_kelas', 'name'=>'deskripsi_kelas', 'title'=>'Deskripsi Kelas'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        
        return view('belakang.kelas.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['jenjang'] = Jenjang::SelectBox();
        return view('belakang.kelas.create', $this->data);
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
            "nama_kelas"                    => "required|unique:tabel_kelas",
            "deskripsi_kelas"             => "required|min:10|max:200",
            "jenjang_id"                    => "required",
        ])->validate();

        $new_kelas = new Kelas;

        $new_kelas->nama_kelas = $request->get('nama_kelas');
        $new_kelas->deskripsi_kelas = $request->get('deskripsi_kelas');
        $new_kelas->jenjang_id = $request->get('jenjang_id');

        $new_kelas->save();
        return redirect()->route('kelas.index')->with('status', 'Data Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Kelas::where('jenjang_id', $id)->with('jenjang')->get()->toArray();
        // dd($data);
        $edit = Kelas::findOrFail($id);
        return view('belakang.kelas.edit',['kelas'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "nama_kelas"          => "required",
            "deskripsi_kelas"   => "required|min:5|max:200",
        ])->validate();

        $kelas = Kelas::findOrFail($id);

        $kelas->nama_kelas = $request->get('nama_kelas');
        $kelas->deskripsi_kelas = $request->get('deskripsi_kelas');

        $kelas->save();

        return redirect()->route('kelas.edit', $kelas->id)->with('status', 'Kelas berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('status', 'Kelas berhasil dihapus!');
    }
}
