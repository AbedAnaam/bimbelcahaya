@extends('layouts.backend.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Jenjang / Tingkat</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('jenjang.store')}}"
                method="POST">

                @csrf

                <label>Jenjang / Tingkat <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_jenjang') ? "is-invalid" : ""}}"
                    value="{{old('nama_jenjang')}}"
                    name="nama_jenjang"
                    placeholder="Masukkan Nama Produk">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_jenjang')}}
                    </div>
                <br>

                <label>Gambar Jenjang <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="file"
                    class="form-control {{$errors->first('gambar_jenjang') ? "is-invalid" : ""}}"
                    name="gambar_jenjang">
                    <div class="invalid-feedback">
                        {{$errors->first('gambar_jenjang')}}
                    </div>
                <br>

                <label>Deskripsi Jenjang <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('deskripsi_content') ? "is-invalid" : ""}}"
                    value="{{old('deskripsi_content')}}" name="deskripsi_content" id="deskripsi_content"></textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('deskripsi_content')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Simpan">

                        <a
                            href="{{route('jenjang.index')}}"
                            type="button"
                            class="btn btn-warning"
                            value="Kembali"> Batal
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