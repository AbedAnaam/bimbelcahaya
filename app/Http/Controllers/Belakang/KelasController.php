<?php

namespace App\Http\Controllers\Belakang;

use App\Model\Kelas;
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
            $kelas = Kelas::select(['id','nama_kelas','gambar_kelas','deskripsi_content']);
                return DataTables::of($kelas)
                ->addColumn('action', function($kelas){
                    return view('belakang.kelas._action', [
                        'model'         => $kelas,
                        'form_url'      => route('kelas.destroy', $kelas->id),
                        'edit_url'      => route('kelas.edit', $kelas->id)]);
                        // 'show_url'      => route('jenjang.show', $jenjangs->id)]);
                })
                ->addColumn('deskripsi_content', function($kelas){
                    return strip_tags($kelas->deskripsi_content);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'nama_kelas', 'name'=>'nama_kelas', 'title'=>'Nama Kelas'])
            ->addColumn(['data'=>'gambar_kelas', 'name'=>'gambar_kelas', 'title'=>'Gambar Kelas'])
            ->addColumn(['data'=>'deskripsi_content', 'name'=>'deskripsi_content', 'title'=>'Deskripsi Kelas'])
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
        return view('belakang.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
