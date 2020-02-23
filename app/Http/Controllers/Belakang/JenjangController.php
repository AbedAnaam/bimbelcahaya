<?php

namespace App\Http\Controllers\Belakang;

use App\Model\Jenjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $jenjangs = Jenjang::select(['id','nama_jenjang','gambar_jenjang','deskripsi_content']);
                return DataTables::of($jenjangs)
                ->addColumn('action', function($jenjangs){
                    return view('belakang.jenjang._action', [
                        'model'         => $jenjangs,
                        'form_url'      => route('jenjang.destroy', $jenjangs->id),
                        'edit_url'      => route('jenjang.edit', $jenjangs->id)]);
                        // 'show_url'      => route('jenjang.show', $jenjangs->id)]);
                })
                ->addColumn('deskripsi_content', function($jenjangs){
                    return strip_tags($jenjangs->deskripsi_content);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'nama_jenjang', 'name'=>'nama_jenjang', 'title'=>'Jenjang/Tingkat'])
            ->addColumn(['data'=>'gambar_jenjang', 'name'=>'gambar_jenjang', 'title'=>'Gambar Jenjang'])
            ->addColumn(['data'=>'deskripsi_content', 'name'=>'deskripsi_content', 'title'=>'Deskripsi Jenjang'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        
        return view('belakang.jenjang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('belakang.jenjang.create');
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
            "nama_jenjang"                  => "required|unique:tabel_jenjang",
            "deskripsi_content"             => "required|min:5|max:200",
            "gambar_jenjang"                => "required",
        ])->validate();

        $new_jenjang = new Jenjang;

        $new_jenjang->nama_jenjang = $request->get('nama_jenjang');
        $new_jenjang->deskripsi_content = $request->get('deskripsi_content');

        if ($request->file('gambar_jenjang')) {
            $file = $request->file('gambar_jenjang')->store('image-jenjang', 'public');
            $new_jenjang->gambar_jenjang = $file;
        }

        $new_jenjang->save();
        return redirect()->route('jenjang.index')->with('status', 'Jenjang atau Tingkat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenjang = Jenjang::findOrFail($id);
        return view('belakang.jenjang.show', ['jenjang'=>$jenjang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Jenjang::findOrFail($id);
        return view('belakang.jenjang.edit',['jenjang'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "nama_jenjang"          => "required",
            "deskripsi_content"       => "required|min:5|max:200",
        ])->validate();

        $jenjang = Jenjang::findOrFail($id);

        $jenjang->nama_jenjang = $request->get('nama_jenjang');
        $jenjang->deskripsi_content = $request->get('deskripsi_content');

        if($request->file('gambar_jenjang')){
            if ($jenjang->gambar_jenjang && file_exists(storage_path('app/public/' . $jenjang->gambar_jenjang))) {
                \Storage::delete('public/' . $jenjang->gambar_jenjang);
            }
            $file = $request->file('gambar_jenjang')->store('image-jenjang', 'public');
            $jenjang->gambar_jenjang = $file;
        }

        $jenjang->save();

        return redirect()->route('jenjang.edit', $jenjang->id)->with('status', 'Jenjang berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenjang = Jenjang::findOrFail($id);
        $jenjang->delete();
        return redirect()->route('jenjang.index')->with('status', 'Jenjang berhasil dihapus!');
    }
}
