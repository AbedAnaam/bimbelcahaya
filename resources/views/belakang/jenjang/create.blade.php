@extends('layouts.backend.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Produk Omah Pastry</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('produk.store')}}"
                method="POST">

                @csrf

                <label>Nama Produk <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_produk') ? "is-invalid" : ""}}"
                    value="{{old('nama_produk')}}"
                    name="nama_produk"
                    placeholder="Masukkan Nama Produk">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_produk')}}
                    </div>
                <br>

                <label>Produk Image <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="file"
                    class="form-control {{$errors->first('image') ? "is-invalid" : ""}}"
                    name="image">
                    <div class="invalid-feedback">
                        {{$errors->first('image')}}
                    </div>
                <br>

                <label>Harga Produk <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('harga') ? "is-invalid" : ""}}"
                    name="harga"
                    placeholder="Masukkan Harga Produk">
                    <div class="invalid-feedback">
                        {{$errors->first('harga')}}
                    </div>
                <br>

                <label>Deskripsi Produk <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('description') ? "is-invalid" : ""}}"
                    value="{{old('description')}}" name="description" id="description"></textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Simpan">

                        <a
                            href="{{route('produk.index')}}"
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
    @include('backend.produk._scripts')
@endsection