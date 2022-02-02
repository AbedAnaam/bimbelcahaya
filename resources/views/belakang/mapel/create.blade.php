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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Mata Pelajaran</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('mapel.store')}}"
                method="POST">

                @csrf

                <label>Nama Mapel <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_mapel') ? "is-invalid" : ""}}"
                    value="{{old('nama_mapel')}}"
                    name="nama_mapel"
                    placeholder="Masukkan Mata Pelajaran">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_mapel')}}
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label>ID Kelas</label>
                            <input type="text" 
                                class="form-control {{$errors->first('kelas_id') ? "is-invalid" : ""}}" 
                                name="kelas_id" 
                                value="{{ $mapel->kelas_id }}" placeholder="{{ $mapel->kelas->nama_kelas}}" 
                                readonly>
                        <div class="invalid-feedback">
                            {{$errors->first('kelas_id')}}
                        </div>
                    </div>
                </div>
                <br>

                <label>Deskripsi Mapel <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('deskripsi_mapel') ? "is-invalid" : ""}}"
                    value="{{old('deskripsi_mapel')}}" name="deskripsi_mapel" id="deskripsi_mapel"></textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('deskripsi_mapel')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Simpan">

                        <a
                            href="{{route('mapel.index')}}"
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
    @include('belakang.mapel._scripts')
@endsection