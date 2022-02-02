@extends('layouts.backend.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kelas</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('kelas.store')}}"
                method="POST">

                @csrf

                <label>Nama Kelas <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_kelas') ? "is-invalid" : ""}}"
                    value="{{old('nama_kelas')}}"
                    name="nama_kelas"
                    placeholder="Masukkan Kelas">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_kelas')}}
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if($errors->has('jenjang_id')) has-error @endif">
                            <label>Pilih Jenjang</label>
                            <select class="form-control border-input" name="jenjang_id">
                                <option value="kosong">- Silakan Pilih Jenjang -</option>
                                @foreach($jenjang as $jdK => $jdV)
                                <option value="{{$jdK}}" {{old('jenjang_id') == $jdK ? 'selected' : ''}}>{{$jdV}}</option>
                                @endforeach
                            </select>
                            <span id="helpBlock2" class="help-block">{{$errors->first('jenjang_id')}}</span>
                        </div>
                    </div>
                </div>

                <label>Deskripsi Kelas <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('deskripsi_kelas') ? "is-invalid" : ""}}"
                    value="{{old('deskripsi_kelas')}}" name="deskripsi_kelas" id="deskripsi_kelas"></textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('deskripsi_kelas')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Simpan">

                        <a
                            href="{{route('kelas.index')}}"
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
    @include('belakang.kelas._scripts')
@endsection