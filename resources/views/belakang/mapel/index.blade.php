@extends('layouts.backend.main')

@section('content')
    <div class="col-sm-12">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        @endif
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-md-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran </h6>
            <a href="{{route('mapel.index')}}" class="d-none d-sm-block mr-2 ml-auto btn btn-sm btn-warning shadow-sm">
                <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Kembali
            </a>
            @if(count($mapel) == 0)
                <a href="{{ route('mapel.create')}}" class="d-none d-sm-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Data Baru
                </a>
            @else
                <a href="{{ route('mapel.tambah', $mpl->kelas_id )}}" class="d-none d-sm-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Data
                </a>
            @endif
        </div>
        <div class="card-body">
            @if(count($mapel) >= 1)
                {!! $html->table(['class'=>'table table-striped table-bordered']) !!}
            @else
                <div class="well alert alert-info">
                    <span><b> MAAF -  </b> DATA MAPEL TIDAK DITEMUKAN</span>
                </div>  
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    {!! $html->scripts() !!}
@endsection