<?php

namespace App\Http\Controllers\Belakang;

use App\Model\Jenjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;

use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Html\Builder;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $produks = Jenjang::select(['id','nama_produk','image','harga','description']);
                return DataTables::of($produks)
                ->addColumn('action', function($produks){
                    return view('belakang.jenjang._action', [
                        'model'         => $produks,
                        'form_url'    => route('jenjang.destroy', $produks->id),
                        'edit_url'      => route('jenjang.edit', $produks->id)]);
                })
                ->addColumn('description', function($produks){
                    return strip_tags($produks->description);
                })->make(true);
        }

        // $html = $htmlBuilder
        //     ->addColumn(['data'=>'nama_produk', 'name'=>'nama_produk', 'title'=>'Nama Produk'])
        //     ->addColumn(['data'=>'image', 'name'=>'image', 'title'=>'Gambar Produk'])
        //     ->addColumn(['data'=>'harga', 'name'=>'harga', 'title'=>'Harga Produk'])
        //     ->addColumn(['data'=>'description', 'name'=>'description', 'title'=>'Deskripsi Produk'])
        //     ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        
        return view('belakang.jenjang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function show(Jenjang $jenjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenjang $jenjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenjang $jenjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jenjang  $jenjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenjang $jenjang)
    {
        //
    }
}
