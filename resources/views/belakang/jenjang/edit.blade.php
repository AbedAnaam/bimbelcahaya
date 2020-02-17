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
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Produk Omah Pastry</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('produk.update', $produk->id)}}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    value="PUT"
                    name="_method">

                <label>Nama Produk <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_produk') ? "is-invalid" : ""}}"
                    value="{{old('nama_produk') ? old('nama_produk') : $produk->nama_produk}}"
                    name="nama_produk"
                    placeholder="Masukkan Nama Produk">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_produk')}}
                    </div>
                <br>

                <label>Produk Image <font style="inline-block" color="red">(*)</font></label><br>
                @if($produk->image)
                    <span>Current image</span><br>
                    <img src="{{asset('storage/'. $produk->image)}}" width="120px">
                    <br><br>
                @endif
                <input
                    type="file"
                    class="form-control {{$errors->first('image') ? "is-invalid" : ""}}"
                    name="image">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    <div class="invalid-feedback">
                        {{$errors->first('image')}}
                    </div>
                <br>
                <br>

                <label>Harga Produk <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('harga') ? "is-invalid" : ""}}"
                    value="{{old('harga') ? old('harga') : $produk->harga}}"
                    name="harga"
                    placeholder="Masukkan Harga Produk">
                    <div class="invalid-feedback">
                        {{$errors->first('harga')}}
                    </div>
                <br>

                <label>Deskripsi Produk <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" 
                    name="description" id="description">
                    {{old('description') ? old('description') : $produk->description}}
                </textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Update">

                        <a
                            href="{{route('produk.index')}}"
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
    @include('backend.produk._scripts')
@endsection