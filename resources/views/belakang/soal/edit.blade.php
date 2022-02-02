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
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Soal</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('soal.update', $soal->id)}}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    value="PUT"
                    name="_method">

                <label>Nama Kelas <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_soal') ? "is-invalid" : ""}}"
                    value="{{old('nama_soal') ? old('nama_soal') : $soal->nama_soal}}"
                    name="nama_soal"
                    placeholder="Masukkan Nama Soal">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_soal')}}
                    </div>
                <br>

                <label>Deskripsi Soal <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('deskripsi_soal') ? "is-invalid" : ""}}" 
                    name="deskripsi_soal" id="deskripsi_soal">
                    {{old('deskripsi_soal') ? old('deskripsi_soal') : $soal->deskripsi_soal}}
                </textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('deskripsi_soal')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Update">

                        <a
                            href="{{route('soal.index')}}"
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
    @include('belakang.soal._scripts')
@endsection