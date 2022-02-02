@extends('layouts.backend.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Soal</h6>
        </div>

        <div>
            <form
                enctype="multipart/form-data"
                class="bg-white shadow-sm p-3"
                action="{{route('soal.store')}}"
                method="POST">

                @csrf

                <label>Nama Soal <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="text"
                    class="form-control {{$errors->first('nama_soal') ? "is-invalid" : ""}}"
                    value="{{old('nama_soal')}}"
                    name="nama_soal"
                    placeholder="Masukkan Soal">
                    <div class="invalid-feedback">
                        {{$errors->first('nama_soal')}}
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if($errors->has('mapel_id')) has-error @endif">
                            <label>Pilih Mata Pelajaran</label>
                            <select class="form-control border-input" name="mapel_id">
                                <option value="kosong">- Silakan Pilih Mata Pelajaran -</option>
                                @foreach($mapel as $jdK => $jdV)
                                <option value="{{$jdK}}" {{old('mapel_id') == $jdK ? 'selected' : ''}}>{{$jdV}}</option>
                                @endforeach
                            </select>
                            <span id="helpBlock2" class="help-block">{{$errors->first('mapel_id')}}</span>
                        </div>
                    </div>
                </div>

                <label>Isi Soal <font style="inline-block" color="red">(*)</font></label>
                <input
                    type="file"
                    class="form-control {{$errors->first('isi_soal') ? "is-invalid" : ""}}"
                    name="isi_soal">
                    <div class="invalid-feedback">
                        {{$errors->first('isi_soal')}}
                    </div>
                <br>

                <label>Deskripsi Soal <font style="inline-block" color="red">(*)</font></label>
                <textarea
                    class="form-control {{$errors->first('deskripsi_soal') ? "is-invalid" : ""}}"
                    value="{{old('deskripsi_soal')}}" name="deskripsi_soal" id="deskripsi_soal"></textarea>
                    <div class="invalid-feedback">
                        {{$errors->first('deskripsi_soal')}}
                    </div>
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Simpan">

                        <a
                            href="{{route('soal.index')}}"
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
    @include('belakang.soal._scripts')
@endsection