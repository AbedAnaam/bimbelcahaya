@extends('layouts.backend.main')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Jenjang atau Tingkat</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('jenjang.update', $jenjang->id)}}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    value="PUT"
                    name="_method">

                <label>Nama Produk <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_jenjang') ? "is-invalid" : ""}}"
                    value="{{old('nama_jenjang') ? old('nama_jenjang') : $jenjang->nama_jenjang}}"
                    name="nama_jenjang"
                    placeholder="Masukkan Nama Jenjang">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_jenjang')}}
                    </div>
                <br>

                <label>Gambar<font style="inline-block" color="red">(*)</font></label><br>
                @if($jenjang->gambar_jenjang)
                    <span>Current image</span><br>
                    <img src="{{asset('storage/'. $jenjang->gambar_jenjang)}}" width="120px">
                    <br><br>
                @endif
                <input
                    type="file"
                    class="form-control {{$errors->first('gambar_jenjang') ? "is-invalid" : ""}}"
                    name="gambar_jenjang">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    <div class="invalid-feedback">
                        {{$errors->first('gambar_jenjang')}}
                    </div>
                <br>
                <br>

                <label>Deskripsi Jenjang <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('deskripsi_content') ? "is-invalid" : ""}}" 
                    name="deskripsi_content" id="deskripsi_content">
                    {{old('deskripsi_content') ? old('deskripsi_content') : $jenjang->deskripsi_content}}
                </textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('deskripsi_content')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Update">

                        <a
                            href="{{route('jenjang.index')}}"
                            type="button"
                            class="btn btn-warning"
                            value="Kembali"> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @include('belakang.jenjang._scripts')
@endsection