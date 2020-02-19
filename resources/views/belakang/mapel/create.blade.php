@extends('layouts.backend.main')

@section('content')
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

                <label>Gambar Mapel <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="file"
                    class="form-control {{$errors->first('gambar_mapel') ? "is-invalid" : ""}}"
                    name="gambar_mapel">
                    <div class="invalid-feedback">
                        {{$errors->first('gambar_mapel')}}
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if($errors->has('kelas_id')) has-error @endif">
                            <label>Pilih Kelas</label>
                            <select class="form-control border-input" name="kelas_id">
                                <option value="kosong">- Silakan Pilih Kelas -</option>
                                @foreach($kelas as $jdK => $jdV)
                                <option value="{{$jdK}}" {{old('kelas_id') == $jdK ? 'selected' : ''}}>{{$jdV}}</option>
                                @endforeach
                            </select>
                            <span id="helpBlock2" class="help-block">{{$errors->first('kelas_id')}}</span>
                        </div>
                    </div>
                </div>

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