@extends('layouts.backend.main')

{{-- @section('pageTitle') Detail User @endsection --}}

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <b>Jenjang / Tingkat</b> <br/>
                {{$jenjang->nama_jenjang}}
                <br><br>

                @if($jenjang->gambar_jenjang)
                    <img src="{{asset('storage/'. $jenjang->gambar_jenjang)}}" width="128px"/>
                @else
                    No avatar
                @endif

                <br>
                <br>
                <b>Deskripsi</b> <br>
                {{$jenjang->deksripsi_content}}

            </div>
        </div>
    </div>
@endsection